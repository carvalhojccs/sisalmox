<?php
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::resource('unidades','UnidadeController');
    Route::any('unidades/search','UnidadeController@search')->name('unidades.search');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
