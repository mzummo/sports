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
// Route::resource('team', 'TeamController');
// Route::resource('player', 'PlayerController');

Route::get('/team/{id?}', 'TeamController@index');
Route::get('/team/{id?}/players', 'TeamController@players');
Route::post('/team', 'TeamController@create');

Route::post('/player/{id}', 'PlayerController@update');
Route::post('/player', 'PlayerController@create');
Route::delete('/player/{id}', 'PlayerController@delete');