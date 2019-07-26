<?php

Route::apiResource('materiais','Api\MaterialApiController');
//Route::get('estoque_atual','Api\MaterialApiController@estoqueAtual');

Route::get('estoque_atual','Api\MaterialNaturezaApiController@getEstoqueAtual');

Route::apiResource('armazenagens','Api\ArmazenagemApiController');