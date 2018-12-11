<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SignupActivate;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:3|max:40',
            'last_name'=> 'required|string|min:3|max:80',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|max:16|confirmed',
        ]);
        $user = new User([
            'name'     => $request->name,
            'last_name'=> $request->last_name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        $user->notify(new SignupActivate($user));

        return response()->json([
            'message' => 'Successfully created user!'], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);

        $credentials = request(['email', 'password']);
        $credentials['active'] = 1;
        $credentials['deleted_at'] = null;
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                    $tokenResult->token->expires_at)->toDateTimeString(),
            ]
        );
    }


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Successfully logged out']);
    }

    
    public function user(Request $request)
    {
        return response()->json($request->user());
    }


    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json(['message' => 'Activation token is invalid'], 404);
        }
        $user->active = true;
        $user->activation_token = '';

        $user->save();

        return $user;
    }
}
