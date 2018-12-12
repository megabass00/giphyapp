<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UsersController extends Controller
{
    // use AuthenticatesUsers;


    // protected $redirectTo = '/consejo';


    // public function __construct()
    // {
    //     $this->middleware('guest')->except(['logout','login']);
    // }

    // protected function credentials(Request $request)
    // {
    //     dd($request);exit();
    //     $field = filter_var($request->get($this->email()), FILTER_VALIDATE_EMAIL)
    //         ? $this->email()
    //         : 'email';

    //     return [
    //         $field => $request->get($this->username()),
    //         'password' => $request->password,
    //     ];
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id')->paginate(5);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'type'      => ['required'],
            'email'     => ['unique:users,email'],
            'password'  => ['min:6','max:16','required']
        ]);

        if ($validator->fails()) {
            return redirect('admin\users\create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User($request->all());
        $user->type = $request->type;
        $user->password = bcrypt($request->password);
        $user->save();
        Flash::success('The user '.$user->name.' has been created succesfully');
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'email' => [
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->type = $request->type;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        Flash::success('The user '.$user->name.' has been updated successfully');
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Flash::warning($user->name.' has been deleted from database');
        return redirect('admin/users');
    }
}
