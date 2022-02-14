<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'thumb' => 'required|url',
            'price' => 'required|numeric|min:1|max:999.99',
            'series' => 'required|string|max:80',
            'sale_date' => 'required|date',
            'type' => 'required|string|max:30'
        ]);

        $new_comic = new Comic();
        $new_comic->title = $input['title'];
        $new_comic->description = $input['description'];
        $new_comic->thumb = $input['thumb'];
        $new_comic->price = $input['price'];
        $new_comic->series = $input['series'];
        $new_comic->sale_date = $input['sale_date'];
        $new_comic->type = $input['type'];
        $new_comic->save();
        
        return redirect()->route('comics.show', $new_comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $input = $request->all();

        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'thumb' => 'required|url',
            'price' => 'required|numeric|min:1|max:999.99',
            'series' => 'required|string|max:80',
            'sale_date' => 'required|date',
            'type' => 'required|string|max:30'
        ]);

        $comic->title = $input['title'];
        $comic->description = $input['description'];
        $comic->thumb = $input['thumb'];
        $comic->price = $input['price'];
        $comic->series = $input['series'];
        $comic->sale_date = $input['sale_date'];
        $comic->type = $input['type'];
        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
