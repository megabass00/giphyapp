<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('consejo');
});

Route::group(['prefix' => 'admin'], function() {

    Route::resource('users', 'UsersController', [
        'as'    => 'admin'
    ]);
    Route::get('users/{id}/destroy', [
        'uses'  => 'UsersController@destroy',
        'as'    => 'admin.users.destroy'
    ]);

    Route::resource('giphies', 'GiphiesController', [
        'as'    => 'admin'
    ]);
    Route::get('giphies/{id}/destroy', [
        'uses'  => 'GiphiesController@destroy',
        'as'    => 'admin.giphies.destroy'
    ]);
});
