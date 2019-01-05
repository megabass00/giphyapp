<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GiphyRequest;
use App\Rules\ValidGiphyUrl;
use App\Giphy;

class HomeController extends Controller
{
    public function consejo()
    {
        return view('front.consejo');
    }


    public function autocomplete(Request $request)
    {
        $term = $request->term;
        $results = Giphy::where('title', 'LIKE', '%'.$term.'%')->take(6)->get();
        foreach($results as $obj) {
            $retval[] = [
                'id' => $obj->id,
                'value' => $obj->title,
                'url' => $obj->url,
            ];
        }
        return response()->json($retval);
    }


    public function searchResults(Request $request)
    {
        $term = $request->query('q');
        $results = Giphy::where('title', 'LIKE', '%'.$term.'%')->get();
        return view('front.search-results')
                ->with('results', $results);
    }


    public function topViewed(Request $request)
    {
        $giphies = Giphy::orderBy('copies_number','DESC')->limit(25)->get();
        return response()->json([
            'success' => true,
            'giphies' => $giphies
        ]);
    }


    public function masonryList(Request $request)
    {
        $giphies = Giphy::inRandomOrder()->take(30)->get();
        return response()->json([
            'success' => true,
            'giphies' => $giphies
        ]);
    }


    public function giphiesList(Request $request)
    {
        if ($request->ajax()) {
            $giphies = Giphy::orderBy('updated_at', 'DESC')->paginate(10);
            return response()->json([
                'success' => true,
                'giphies' => $giphies
            ], 200);
        }
        return view('front.giphies-list');
    }


    public function addGiphy(GiphyRequest $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'title' => ['required'],
                'description' => ['required'],
                'url' => ['required', new ValidGiphyUrl]
            ]);
            $giphy = new Giphy();
            $giphy->title = $request->title;
            $giphy->description = $request->description;
            $giphy->url = $request->url;
            $giphy->rating = 0.0;
            $giphy->copies_number = 0;
            $giphy->save();
            
            //TODO: add tags to modal
            // $giphy->tags()->sync($request->tags);

            return response()->json([
                'success' => true,
                'giphy' => $giphy
            ], 200);
        }
    }

    public function updateGiphy(GiphyRequest $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'title' => ['required'],
                'description' => ['required'],
                'url' => ['required', new ValidGiphyUrl]
            ]);
            $giphy = Giphy::find($request->id);
            $giphy->title = $request->title;
            $giphy->description = $request->description;
            $giphy->url = $request->url;
            $giphy->save();
            
            //TODO: add tags to modal
            // $giphy->tags()->sync($request->tags);

            return response()->json([
                'success' => true,
                'giphy' => $giphy
            ], 200);
        }
    }
}
