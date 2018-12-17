<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Giphy;
use Laracasts\Flash\Flash;
use App\Http\Requests\GiphyRequest;
use App\Rules\ValidGiphyUrl;

class GiphiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giphies = Giphy::orderBy('title')->paginate(20);
        return view('admin.giphies.index')->with('giphies', $giphies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.giphies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiphyRequest $request)
    {
        $request->validate([
            'url' => ['required', new ValidGiphyUrl]
        ]);

        $giphy = new Giphy($request->all());
        $giphy->title = $request->title;
        $giphy->description = $request->description;
        $giphy->url = $request->url;
        $giphy->rating = 0.0;
        $giphy->copies_number = 0;
        $giphy->save();
        Flash::success('The giphy '.$giphy->title.' has been created succesfully');
        return redirect('admin/giphies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $giphy = Giphy::find($id);
        return view('admin.giphies.show')->with('giphy', $giphy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $giphy = Giphy::find($id);
        return view('admin.giphies.edit')->with('giphy', $giphy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GiphyRequest $request, $id)
    {
        $request->validate([
            'url' => ['required', new ValidGiphyUrl]
        ]);
        
        $giphy = Giphy::find($id);
        $giphy->title = $request->title;
        $giphy->description = $request->description;
        $giphy->url = $request->url;
        $giphy->save();

        Flash::success($giphy->title.' has been updated successfully');
        return redirect('admin/giphies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $giphy = Giphy::find($id);
        $giphy->delete();
        Flash::warning($giphy->title.' has been deleted from database');
        return redirect('admin/giphies');
    }


    /**
     * 
     * AJAX Internal API
     * 
     */
    public function sum(Request $request)
    {
        $giphy = Giphy::find($request->id);
        $giphy->copies_number += 1;
        $giphy->save();

        return response()->json([
            'success' => 'true',
            'request' => $request
        ]);
    }
}
