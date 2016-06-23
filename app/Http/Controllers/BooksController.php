<?php

namespace App\Http\Controllers;
use App\Book;
use App\Author;
use Input;
use Redirect;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;

class BooksController extends Controller
{
    protected $rules = [
        'title' => ['required'],
        'isbn' => ['required'],
        'number_of_pages' => ['required', 'numeric', 'min:1'],
        'image' => ['mimes:png,jpeg,jpg'],
        'author' => ['required', 'array']
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::lists('name', 'id');
        $authors_selected = null;
        return view('books.create', array('authors' => $authors, 'authors_selected' => null));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $input = Input::all();

        // Book image
        if ($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/', $name);
            $input['image'] = $name;
        }


        $book = Book::create($input);
        // Authors relation
        $book->authors()->sync($input['author']);


        return Redirect::route('books.index')->with('message', 'Livro criado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', array('book' => $book));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        $authors = Author::lists('name', 'id');
        $authors_selected = $book->authors->lists('id')->all();
        return view('books.edit', array('book' => $book, 'authors' => $authors, 'authors_selected' => $authors_selected));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);
        $input = array_except(Input::all(), '_method');
        $book = Book::find($id);


        // Book image
        if ($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/', $name);
            $input['image'] = $name;
        } else {
            $input['image'] = $book->image;
        }

        // Authors relation
        $book->authors()->sync($input['author']);

        $book->update($input);

        return Redirect::route('books.show', $book->id)->with('message', 'Livro atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return Redirect::route('books.index')->with('message', 'Livro removido');
    }
}
