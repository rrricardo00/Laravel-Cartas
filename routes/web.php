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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adicionar','CartasController@adicionar')->name('paginaAdicionar');
//Adicionar
Route::post('/adicionar', 'CartasController@store')->name('adicionar');
//Listar Todos
Route::get('/listar','CartasController@listar');
//Atualizar
Route::get('atualizar/{id}','CartasController@edit');
Route::post('atualizar/{id}', 'CartasController@update');
//Procurar por ID
Route::get('/procurar', 'CartasController@procurar');
Route::post('/procurar/{id}', 'CartasController@show');
//Procurar por Data
Route::get('/procurardata', 'CartasController@procurarData');
Route::post('/procurardata/{data}/{data2}', 'CartasController@procurarDataShow');
//Deletar
Route::get('/excluir/{id}','CartasController@destroy');
//GerarPDF-porWebBrowser
Route::get('/gerarpdf', 'CartasController@procurarDataShowPDF');
Route::post('/gerarpdf/{data}/{data2}', 'CartasController@gerarDataShowPDF');

