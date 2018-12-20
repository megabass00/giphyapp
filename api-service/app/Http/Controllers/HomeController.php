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


    public function topViewed(Request $request)
    {
        $giphies = Giphy::orderBy('rating')->limit(25)->get();
        return response()->json([
            'success' => true,
            'giphies' => $giphies
        ]);
    }


    public function masonryList(Request $request)
    {
        $giphies = Giphy::inRandomOrder()->take(100)->get();
        return response()->json([
            'success' => true,
            'giphies' => $giphies
        ]);
    }
}
