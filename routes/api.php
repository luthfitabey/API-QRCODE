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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('mahasiswa', 'MahasiswaController@index');
Route::get('mahasiswa/{niu}', 'MahasiswaController@show');
Route::post('mahasiswa', 'MahasiswaController@store')->middleware('auth:api');
Route::put('mahasiswa/{niu}', 'MahasiswaController@update');
Route::delete('mahasiswa/{niu}', 'MahasiswaController@delete');

Route::group(['middleware' => 'auth:api'], function(){
  Route::post('details', 'API\UserController@details');
});
