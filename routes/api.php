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
//Agence--Route start
Route::delete('agence/delete/{id}', 'AgenceController@destroy');
Route::put('agence/edit/{id}', 'AgenceController@edit');
Route::get('agence/show/{id}', 'AgenceController@show');
Route::post('agence/create', 'AgenceController@create');
Route::get('agence/index', 'AgenceController@index');
//Agence--Route start
//Compte--Route start
Route::get('compte/liste','CompteController@index');
Route::put('compte/update','CompteController@edit');
Route::delete('compte/delete','CompteController@destroy');
//Compte--Route end
//Operation--Route start
Route::delete('operation/delete/{id}', 'OperationController@destroy');
Route::put('operation/edit/{id}', 'OperationController@edit');
Route::get('operation/show/{id}', 'OperationController@show');
Route::post('operation/create', 'OperationController@create');
Route::get('operation/liste', 'OperationController@index');
//Operation--Route end
//Employer--Route start
Route::get('employer/liste','Auth\RegisterController@index');
Route::post('employer/create','Auth\RegisterController@create');
Route::get('employer/show/{id}','Auth\RegisterController@show');
Route::put('employer/edit/{id}','Auth\RegisterController@edit');
Route::delete('employer/delete/{id}','Auth\RegisterController@destroy');
//Employer--Route start
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Settings--Route end
Route::get('setting/liste','SettingController@index');
Route::post('setting/create','SettingController@create');
Route::put('setting/edit/','SettingController@edit');
Route::delete('setting/delete/','SettingController@destroy');
//Settings--Route end

//client--Route start
Route::delete('client/delete/{id}', 'ClientController@destroy');
Route::put('client/edit/{id}', 'ClientController@edit');
Route::get('client/show/{id}', 'ClientController@show');
Route::post('client/create', 'ClientController@create');
Route::get('client/index', 'ClientController@index');
//client--Route end

//Agence--Route start
Route::delete('agence/delete/{id}', 'AgenceController@destroy');
Route::put('agence/edit/{id}', 'AgenceController@edit');
Route::get('agence/show/{id}', 'AgenceController@show');
Route::post('agence/create', 'AgenceController@create');
Route::get('agence/index', 'AgenceController@index');
//Agence--Route end
