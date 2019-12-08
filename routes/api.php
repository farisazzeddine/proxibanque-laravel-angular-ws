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
//Compte--Route start
Route::get('compte/liste','CompteController@index');
Route::put('compte/update','CompteController@edit');
Route::delete('compte/delete','CompteController@destroy');
//Compte--Route end
//Operation--Route start
Route::delete('operation/{id}', 'OperationController@destroy');
Route::put('operation/{id}', 'OperationController@edit');
Route::get('operation/{id}', 'OperationController@show');
Route::post('operation', 'OperationController@create');
Route::get('operation', 'OperationController@index');
//Operation--Route end
//Employer--Route start
// Route::get('employer/liste','Auth\RegisterController@index');
// Route::post('employer/create','Auth\RegisterController@create');
// Route::get('employer/show/{id}','Auth\RegisterController@show');
// Route::put('employer/edit/{id}','Auth\RegisterController@edit');
// Route::delete('employer/delete/{id}','Auth\RegisterController@destroy');
//json
//Employer--Route start



Route::group([

    'middleware' => 'api',

], function () {
    Route::post('login','API\UserController@login');
    Route::post('register','API\UserController@register');
    Route::post('logout','API\UserController@logout');

    Route::get('employer/gerant','API\UserController@getGerant');
    Route::get('employer/agent','API\UserController@getAgent');

    Route::post('refresh', 'API\UserController@refresh');
    Route::post('me', 'API\UserController@me');
    Route::post('details','API\UserController@details');

});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Settings--Route end
Route::get('setting','SettingController@index');
Route::post('setting','SettingController@create');
Route::put('setting/{id}','SettingController@edit');
Route::delete('setting/{id}','SettingController@destroy');
//Settings--Route end

//client--Route start
Route::delete('client/{id}', 'ClientController@destroy');
Route::put('client/{id}', 'ClientController@edit');
Route::get('client/{id}', 'ClientController@show');
Route::post('client', 'ClientController@create');
Route::get('client', 'ClientController@index');
//client--Route end

//Agence--RouteApi start
Route::delete('agence/{id}', 'AgenceController@destroy');
Route::put('agence/{id}', 'AgenceController@edit');
Route::get('agence/{id}', 'AgenceController@show');
Route::post('agence', 'AgenceController@create');
Route::get('agence', 'AgenceController@index');
//Agence--RouteApi end
