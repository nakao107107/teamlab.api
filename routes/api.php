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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get    ('/items', 'ItemController@index');
Route::get    ('/items/{item_id}', 'ItemController@show');
Route::post   ('/items', 'ItemController@store');
Route::put    ('/items/{item_id}', 'ItemController@update');
Route::delete ('/items/{item_id}', 'ItemController@delete');


