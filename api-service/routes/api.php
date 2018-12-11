<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('giphies', 'ApiGiphyController');

Route::group(['prefix' => 'auth'], function () 
{
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });

    /*Route::post('login', [
        'uses'  => 'AuthController@login',
        'as'    => 'api.auth.login'
    ]);
    Route::post('signup', [
        'uses'  => 'AuthController@signup',
        'as'    => 'api.auth.signup'
    ]);
  
    Route::group(['middleware' => 'auth:api'], function() 
    {
        Route::get('logout', [
            'uses'  => 'AuthController@logout',
            'as'    => 'api.auth.logout'
        ]);
        Route::get('user', [
            'uses'  => 'AuthController@user',
            'as'    => 'api.auth.user'
        ]);
    });*/
});
