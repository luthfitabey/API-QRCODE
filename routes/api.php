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
// Route::post('auth/mahasiswa/register', 'AuthController@mahasiswaRegister');
// Route::post('auth/pegawai/register', 'AuthController@pegawaiRegister');
// Route::post('auth/login', 'AuthController@Login');

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
  Route::post('user/{id}', 'API\UserController@update');
// Route::get('mahasiswa', 'MahasiswaController@index');
// Route::get('mahasiswa/{niu}', 'MahasiswaController@show');
// Route::post('mahasiswa', 'MahasiswaController@store')->middleware('auth:api');
// Route::put('mahasiswa/{niu}', 'MahasiswaController@update');
// Route::delete('mahasiswa/{niu}', 'MahasiswaController@delete');



Route::group(['middleware' => 'auth:api'], function(){
  // Route::post('details', 'API\UserController@details');


  //detail pertemuan
  Route::post('detailPertemuan', 'DetailPertemuanController@store');
  Route::get('detailPertemuan', 'DetailPertemuanController@index');
  Route::get('detail/{id}', 'DetailPertemuanController@detail');
  Route::post('detailPertemuan/{id}', 'DetailPertemuanController@update');
  // Route::get('detailPertemuan/{$id}', 'DetailPertemuanController@show');
  // Route::put('detailPertemuan/{niu}', 'DetailPertemuanController@update');
  // Route::delete('detailPertemuan/{niu}', 'DetailPertemuanController@delete');
  //profil
  Route::get('profile', 'API\UserController@details');
  Route::post('profil', 'MahasiswaController@store');

  // Route::get('profil', 'MahasiswaController@index');
  // Route::get('profil/{$id}', 'MahasiswaController@show');
  // Route::put('profile/update/{mahasiswa}', 'MahasiswaController@update');
  // Route::delete('profil/{niu}', 'MahasiswaController@delete');

  //history
  Route::get('history', 'API\UserController@history');
  //materi
  Route::get('materi', 'PertemuanController@index');
  //pertemuan
  Route::get('/pertemuan/{id}', 'PertemuanController@show');
  Route::get('/materiId/{id}', 'PertemuanController@pertemuanId');
  // Route::post('/apalah}', 'PertemuanController@coba');
  //Jadwal
  Route::get('jadwal', 'JadwalController@index');

  Route::get('/ShowUpdatePertemuan/{id}', 'PertemuanController@ShowUpdatePertemuan');

//cek detail is nullable
Route::get('/cek', 'DetailPertemuanController@cekPresensi');

});
