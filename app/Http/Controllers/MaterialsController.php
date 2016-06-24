<?php

namespace App\Http\Controllers;
use App\Material;
use App\Author;
use App\Type;
use Input;
use Redirect;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;

class MaterialsController extends Controller
{
    protected $general_rules = [
        'type_id' => ['required'],
        'title' => ['required'],
        'author' => ['required', 'array'],
        'image' => ['mimes:png,jpeg,jpg']
    ];

    protected $book_rules = [
        'isbn' => ['required'],
        'number_of_pages' => ['required', 'numeric', 'min:1'],
        'author' => ['required', 'array']
    ];

    protected $dictionary_rules = [
        'edition' => ['required']
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::lists('name', 'id');
        $authors = Author::lists('name', 'id');
        $authors_selected = null;
        return view('materials.create', array('types' => $types, 'authors' => $authors, 'authors_selected' => null));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->general_rules;

        switch ($request['type_id']) {
            case '1':
                $rules = array_merge($rules, $this->book_rules);
                break;
            case '2':
                $rules = array_merge($rules, $this->dictionary_rules);
                break;
        }

        $this->validate($request, $rules);
        $input = Input::all();

        // Material image
        if ($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/', $name);
            $input['image'] = $name;
        }


        $material = Material::create($input);
        // Authors relation
        $material->authors()->sync($input['author']);


        return Redirect::route('materials.index')->with('message', 'Material criado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = Material::find($id);
        return view('materials.show', array('material' => $material));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);

        $authors = Author::lists('name', 'id');
        $types = Type::lists('name', 'id');
        $authors_selected = $material->authors->lists('id')->all();
        return view('materials.edit', array('material' => $material, 'types' => $types, 'authors' => $authors, 'authors_selected' => $authors_selected));
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
        $rules = $this->general_rules;

        switch ($request['type_id']) {
            case '1':
                $rules = array_merge($rules, $this->book_rules);
                break;
            case '2':
                $rules = array_merge($rules, $this->dictionary_rules);
                break;
        }

        $this->validate($request, $rules);

        $input = array_except(Input::all(), '_method');
        $material = Material::find($id);


        // Material image
        if ($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/', $name);
            $input['image'] = $name;
        } else {
            $input['image'] = $material->image;
        }

        // Authors relation
        $material->authors()->sync($input['author']);

        $material->update($input);

        return Redirect::route('materials.show', $material->id)->with('message', 'Material atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();

        return Redirect::route('materials.index')->with('message', 'Material removido');
    }
}
