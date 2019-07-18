<?php
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::any('unidades/search','UnidadeController@search')->name('unidades.search');
    Route::resource('unidades','UnidadeController');
    
    Route::any('naturezas/search','NaturezaController@search')->name('naturezas.search');
    Route::resource('naturezas','NaturezaController');
    
    Route::any('contas/search','ContaController@search')->name('contas.search');
    Route::resource('contas','ContaController');
    
    Route::any('equipamentos/search','EquipamentoController@search')->name('equipamentos.search');
    Route::resource('equipamentos','EquipamentoController');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
