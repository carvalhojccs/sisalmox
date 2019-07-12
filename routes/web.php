<?php
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::resource('unidades','UnidadeController');
    Route::any('unidades/search','UnidadeController@search')->name('unidades.search');
    
    Route::resource('naturezas','NaturezaController');
    Route::any('naturezas/search','NaturezaController@search')->name('naturezas.search');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
