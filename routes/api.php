<?php

use App\Http\Controllers\Auth\RegisterController;
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
//Employer--Route start
Route::get('employer/liste','Auth\RegisterController@index');
Route::post('employer/create','Auth\RegisterController@create');
Route::get('employer/show/{id}','Auth\RegisterController@show');
Route::put('employer/edit/{id}','Auth\RegisterController@edit');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Settings--Route end
Route::get('setting/index','SettingController@index');
Route::post('setting/create','SettingController@create');
//Settings--Route end
//client--Route start
Route::delete('client/delete/{id}', 'ClientController@destroy');
Route::put('client/edit/{id}', 'ClientController@edit');
Route::get('client/show/{id}', 'ClientController@show');
Route::post('client/create', 'ClientController@create');
Route::get('client/index', 'ClientController@index');
//client--Route end

//Agence--Route start
Route::delete('agence/delete/{idAgence}', 'AgenceController@destroy');
Route::put('agence/edit/{idAgence}', 'AgenceController@edit');
Route::get('agence/show/{idAgence}', 'AgenceController@show');
Route::post('agence/create', 'AgenceController@create');
Route::get('agence/index', 'AgenceController@index');
//Agence--Route end
