<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/", 'PrincipalController@principal')->name('site.index');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

/* Login */
Route::get('/login', function(){return 'Teste';})->name('site.login');

/* App */
Route::prefix('/app')->group( function(){
  Route::get('/clientes', function(){return 'Teste';})->name('app.clientes');
  Route::get('/fornecedores', function(){return 'Teste';})->name('app.fornecedores');
  Route::get('/produtos', function(){return 'Teste';})->name('app.produto');
});

/* Rotas Teste Redirecionamento */
Route::get('/rota1', function(){
  return Redirect()->route('site.rota2');
})->name('site.rota1');

Route::get('/rota2', function(){
  return 'Rota 2';
})->name('site.rota2');


/* Rota Fallback */
Route::fallback(function(){
  return 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial.';
})->name('site.fallback');