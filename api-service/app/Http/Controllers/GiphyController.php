<?php

namespace App\Http\Controllers;

use App\Giphy;
use Illuminate\Http\Request;

class GiphyController extends Controller
{
    
    public function index()
    {
        $giphies = Giphy::get();
        echo json_encode($giphies);
    }


    public function store(Request $request)
    {
        // $ok = Giphy::create($request->all());
        $giphy = new Giphy();
        $giphy->title = $request->input('title');
        $giphy->description = $request->input('description');
        $giphy->url = $request->input('url');
        $giphy->rating = $request->input('rating');
        $giphy->copies_number = $request->input('copies_number');
        $ok = $giphy->save();

        if ($ok) {
            echo json_encode($giphy);
        }else{
            $this->showGenericError();
        }
    }


    public function update(Request $request, $giphyId)
    {
        $giphy = Giphy::find($giphyId);
        if (empty($giphy)) {
            echo 'No se ha encontrado el objeto';
            return;
        }
        
        $giphy->title = $request->input('title');
        $giphy->description = $request->input('description');
        $giphy->url = $request->input('url');
        $giphy->rating = $request->input('rating');
        $giphy->copies_number = $request->input('copies_number');
        $ok = $giphy->save();

        if ($ok) {
            echo json_encode($giphy);
        }else{
            $this->showGenericError();
        }
    }


    public function destroy($giphyId)
    {
        $giphy = Giphy::find($giphyId);
        if (empty($giphy)) {
            echo 'No se ha encontrado el objeto';
            return;
        }

        $ok = $giphy->delete();

        if ($ok) {
            echo 'Se ha eliminado correctamente el objeto';
        }else{
            $this->showGenericError();
        }
    }
}
