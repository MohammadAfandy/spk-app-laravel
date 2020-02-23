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

// Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
// Route::get('register', 'AuthController@register');
// Route::get('email', 'AuthController@email');
// Route::get('reset', 'AuthController@reset');

// Route::get('spk', ['as' => 'spk', 'uses' => 'SpkController@index']);
// Route::get('spk/create', ['as' => 'spk.create', 'uses' => 'SpkController@create']);

Route::group(['middleware' => ['web']], function(){
    Auth::routes();
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/', function () {
            return view('index');
        });
        
        // SPK
        Route::resource('spk', 'SpkController');
        
        // Alternatif
        Route::resource('alternatif', 'AlternatifController');

        // Kriteria
        Route::resource('kriteria', 'KriteriaController')->parameters([
            'kriteria' => 'kriteria',
        ]);
        Route::post('kriteria/setBobot', [
            'as' => 'kriteria.setBobot',
            'uses' => 'KriteriaController@setBobot',
        ]);

        // Sub Kriteria
        Route::get('subKriteria/{kriteria}/form', [
            'as' => 'subKriteria.form',
            'uses' => 'SubKriteriaController@form',
        ]);
        Route::post('subKriteria', [
            'as' => 'subKriteria.store',
            'uses' => 'SubKriteriaController@store',
        ]);

        // Penilaian
        Route::resource('penilaian', 'PenilaianController');
        
        // Datatable API
        Route::group(['prefix' => 'datatable', 'namespace' => 'Datatable'], function(){
            Route::get('spk', [
                'as' => 'datatable.spk',
                'uses' => 'SpkController@me',
            ]);
            Route::get('alternatif', [
                'as' => 'datatable.alternatif',
                'uses' => 'AlternatifController@me',
            ]);
            Route::get('kriteria', [
                'as' => 'datatable.kriteria',
                'uses' => 'KriteriaController@me',
            ]);
            Route::get('penilaian', [
                'as' => 'datatable.penilaian',
                'uses' => 'PenilaianController@me',
            ]);
        });
    });
});