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
    // return view('welcome');
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes(); // auto add the routes for authentication

Route::get('/home', 'HomeController@index')->name('home');

# API (adding routes here because I don't want to use JWT or reconfigure API to use session)

// Route::get('api/team/{id?}', 'TeamController@index');
// Route::get('api/team/{id}/players', 'TeamController@players');
// Route::post('api/team', 'TeamController@create');

// Route::post('api/player/{id}', 'PlayerController@update');
// Route::post('api/player', 'PlayerController@create');
// Route::delete('api/player/{id}', 'PlayerController@delete');