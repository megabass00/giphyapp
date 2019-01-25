<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class ApiTagsController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('name','ASC')->get();
        echo json_encode($tags);
    }
}
