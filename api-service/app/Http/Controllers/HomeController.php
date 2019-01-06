<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GiphyRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\ValidGiphyUrl;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Giphy;
use App\Tag;
use App\User;

class HomeController extends Controller
{
    public function consejo()
    {
        return view('front.consejo');
    }


    /*
    * Searcher
    */
    public function autocomplete(Request $request)
    {
        $term = $request->term;
        $results = Giphy::where('title', 'LIKE', '%'.$term.'%')->take(6)->get();
        $retval = [];
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
        $results = Giphy::with(['tags'])->where('title', 'LIKE', '%'.$term.'%')->get();
        return view('front.search-results')
                ->with('results', $results);
    }


    /*
    * Tags
    */
    public function bestTags(Request $request)
    {
        $tags = Tag::orderBy('id','ASC')->take(7)->get();
        return response()->json([
            'success' => true,
            'tags' => $tags
        ]);
    }


    public function tagShow($name)
    {
        $tag = Tag::where('name',$name)->first();
        return view('front.tag-show')
                ->with('tag', $tag);
    }


    /*
    * Top Viewed
    */
    public function topViewed(Request $request)
    {
        $giphies = Giphy::orderBy('copies_number','DESC')->limit(25)->get();
        return response()->json([
            'success' => true,
            'giphies' => $giphies
        ]);
    }


    /*
    * Masonry
    */
    public function masonryList(Request $request)
    {
        $giphies = Giphy::inRandomOrder()->take(30)->get();
        return response()->json([
            'success' => true,
            'giphies' => $giphies
        ]);
    }


    /*
    * Giphies List Ajax
    */
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


    /*
    * Edit User Profile
    */
    public function editUserProfile(Request $request) //UserRequest
    {
        $user = User::find(Auth::user()->id);
        // dd($user->url_image);
        if ($request->post()) 
        {
            $validator = Validator::make($request->all(), [
                'email' => [
                    Rule::unique('users')->ignore($user->id),
                ],
            ]);
            // if ($validator->fails()) {
            //     return redirect('post/create')
            //                 ->withErrors($validator)
            //                 ->withInput();
            // }
    
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            if (!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return redirect('/consejo');
        }

        // if get method
        return view('front.edit-profile')->with('user', $user);
    }


    public function updateProfileImage(Request $request) 
    {
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $pathToSave = 'images/users/';
            Image::make($image)
                    ->fit(150, 150)
                    ->save($pathToSave.$filename, 80);
            
            $user = Auth::user();
            $oldImage = $user->image;

            $user = User::find(Auth::user()->id);
            $user->image = $filename;
            $user->save();

            if ($oldImage !== 'default.png') {
                unlink($pathToSave.$oldImage);
            }

            return response()->json([
                'success' => true,
                'user' => $user,
            ]);
        };

        return response()->json([
            'success' => false,
            'error' => 'No se ha podido actualizar la imagen'
        ], 401);
    }
}
