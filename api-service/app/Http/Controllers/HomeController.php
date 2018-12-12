<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Giphy;

class HomeController extends Controller
{
    public function consejo()
    {
        $giphies = Giphy::orderBy('title')->limit(8)->get();
        // dd($giphies);exit();
        return view('consejo')->with('giphies', $giphies);
    }
}
