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

Route::get('/team/{id?}', 'TeamController@index');
Route::get('/team/{id}/players', 'TeamController@players');
Route::post('/team', 'TeamController@create');

Route::post('/player/{id}', 'PlayerController@update');
Route::post('/player', 'PlayerController@create');
Route::delete('/player/{id}', 'PlayerController@delete');