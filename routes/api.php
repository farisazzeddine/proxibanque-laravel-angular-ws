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
Route::delete('delete/client/{id}', 'ClientController@destroy');
Route::put('edit/client/{id}', 'ClientController@edit');
Route::get('show/client/{id}', 'ClientController@show');
Route::post('create/client', 'ClientController@create');
Route::get('index/client', 'ClientController@index');

