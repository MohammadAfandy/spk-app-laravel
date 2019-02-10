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
    return view('index');
});

Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('register', 'AuthController@register');
Route::get('email', 'AuthController@email');
Route::get('reset', 'AuthController@reset');

// Route::get('spk', ['as' => 'spk', 'uses' => 'SpkController@index']);
// Route::get('spk/create', ['as' => 'spk.create', 'uses' => 'SpkController@create']);

Route::group(['middleware' => ['web']], function(){
	Route::resource('spk', 'SpkController');
});