<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('auth/login');
});

Route::get('home', function () {
    return redirect('assistidos');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/assistidos', 'AssistidoController@lista');

Route::get('/assistidos/listaPorId/{id}', 'AssistidoController@listaPorId');

Route::get('/assistidos/novo', 'AssistidoController@novo');

Route::post('/assistidos/adiciona', 'AssistidoController@adiciona');

Route::get('/assistidos/getEstadoPorId/{id}', 'AssistidoController@getEstadoPorId');

Route::post('/assistidos/enviaDocumento/{id}', 'AssistidoController@enviaDocumento');

Route::get('/entrevista/nova/{id}', 'EntrevistaController@nova');

Route::post('/entrevista/adiciona/{id}', 'EntrevistaController@adiciona');

Route::get('/entrevista/listaPorAssistido/{id}', 'EntrevistaController@listaPorAssistido');

Route::get('/assistidos/listadocumentos/{id}', 'AssistidoController@listaDocumentos');

Route::get('/assistidos/baixadocumento/{id}/{documento}', 'AssistidoController@baixaDocumento');