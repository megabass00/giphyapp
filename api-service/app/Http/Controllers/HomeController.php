<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Giphy;

class HomeController extends Controller
{
    public function consejo()
    {
        $giphies = Giphy::orderBy('rating')->limit(25)->get();
        return view('consejo')->with('giphies', $giphies);
    }


    public function masonryList(Request $request)
    {
        $giphies = Giphy::orderBy('title')->take(40)->get();
        return response()->json([
            'success' => true,
            'giphies' => $giphies
        ]);
    }
}
