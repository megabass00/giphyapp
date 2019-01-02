<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Giphy;

class HomeController extends Controller
{
    public function consejo()
    {
        return view('consejo');
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
        // dd($results);
        return view('search-results')
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
        $giphies = Giphy::inRandomOrder()->take(70)->get();
        return response()->json([
            'success' => true,
            'giphies' => $giphies
        ]);
    }
}
