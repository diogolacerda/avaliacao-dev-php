<?php

namespace App\Http\Controllers;
use App\Dictionary;
use App\Author;
use Input;
use Redirect;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;

class DictionariesController extends Controller
{
    protected $rules = [
        'title' => ['required'],
        'edition' => ['required'],
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
        $dictionaries = Dictionary::all();
        return view('dictionaries.index', compact('dictionaries'));
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
        return view('dictionaries.create', array('authors' => $authors, 'authors_selected' => null));
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

        // Dictionary image
        if ($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/', $name);
            $input['image'] = $name;
        }


        $dictionary = Dictionary::create($input);
        // Authors relation
        $dictionary->authors()->sync($input['author']);


        return Redirect::route('dictionaries.index')->with('message', 'Dicionário criado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dictionary = Dictionary::find($id);
        return view('dictionaries.show', array('dictionary' => $dictionary));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dictionary = Dictionary::find($id);

        $authors = Author::lists('name', 'id');
        $authors_selected = $dictionary->authors->lists('id')->all();
        return view('dictionaries.edit', array('dictionary' => $dictionary, 'authors' => $authors, 'authors_selected' => $authors_selected));
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
        $dictionary = Dictionary::find($id);


        // Dictionary image
        if ($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/', $name);
            $input['image'] = $name;
        } else {
            $input['image'] = $dictionary->image;
        }

        // Authors relation
        $dictionary->authors()->sync($input['author']);

        $dictionary->update($input);

        return Redirect::route('dictionaries.show', $dictionary->id)->with('message', 'Dicionário atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dictionary = Dictionary::find($id);
        $dictionary->delete();

        return Redirect::route('dictionaries.index')->with('message', 'Dicionário removido');
    }
}
