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
    
    Route::any('armazens/search','ArmazemController@search')->name('armazens.search');
    Route::resource('armazens','ArmazemController');
    
    Route::any('armazenagens/search','ArmazenagemController@search')->name('armazenagens.search');
    Route::resource('armazenagens','ArmazenagemController');
    
    Route::any('materiais/search','MaterialController@search')->name('materiais.search');
    Route::resource('materiais','MaterialController');
    
    Route::any('documentos/search','DocumentoController@search')->name('documentos.search');
    Route::resource('documentos','DocumentoController');
    
    Route::any('fornecedores/search','FornecedorController@search')->name('fornecedores.search');
    Route::resource('fornecedores','FornecedorController');
    
    Route::any('tipo_movimentos/search','TipoMovimentoController@search')->name('tipo_movimentos.search');
    Route::resource('tipo_movimentos','TipoMovimentoController');
    
    Route::any('movimentos/search','MovimentoController@search')->name('movimentos.search');
    Route::resource('movimentos','MovimentoController');
    
    Route::any('entradas/search','EntradaController@search')->name('entradas.search');
    Route::resource('entradas','EntradaController');
    
    Route::any('papeis/search','PapelController@search')->name('papeis.search');
    Route::resource('papeis','PapelController');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
