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

// INDEX //
Route::get('/', 'HomeController@consejo')->name('consejo');
Route::get('/consejo', 'HomeController@consejo')->name('consejo');


// LOGIN / LOGOUT //
Route::get('/login', function() {
    return view('/admin/login/login');
})->name('login');
$this->post('login', 'LoginController@login');
$this->get('logout', 'LoginController@logout')->name('logout');


// ADMIN PANEL //
Route::group(['prefix' => 'admin', 'middleware' => ['auth','usertype:admin']], function() {

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

// ajax //
Route::post('ajax/giphies/sum', 'GiphiesController@sum');
Route::post('ajax/giphies/topViewed', 'HomeController@topViewed');
Route::post('ajax/giphies/masonryList', 'HomeController@masonryList');
