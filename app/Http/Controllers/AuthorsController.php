<?php

namespace App\Http\Controllers;
use App\Author;
use Input;
use Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthorsController extends Controller
{
    protected $rules = [
        'name' => ['required', 'min:3'],
        'notation' => ['max:3']
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
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
        if ($input['notation'] == "") {
            $input['notation'] = strtoupper(substr($input['name'], 0, 3));
        } else {
            $input['notation'] = strtoupper($input['notation']);
        }

        Author::create($input);

        return Redirect::route('authors.index')->with('message', 'Autor criado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);
        return view('authors.show', array('author' => $author));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);
        return view('authors.edit', array('author' => $author));
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
        if ($input['notation'] == "") {
            $input['notation'] = strtoupper(substr($input['name'], 0, 3));
        } else {
            $input['notation'] = strtoupper($input['notation']);
        }
        $author = Author::find($id);
        $author->update($input);

        return Redirect::route('authors.show', $author->id)->with('message', 'Autor atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();

        return Redirect::route('authors.index')->with('message', 'Autor removido');
    }
}
