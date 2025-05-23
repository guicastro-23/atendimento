<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\SituacaoController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ChamadoController::class, 'percentual'])->name('welcome');

//Categorias 
ROUTE::get('/index-categoria', [CategoriaController::class, 'index']) -> name('categoria.index');
ROUTE::get('/create-categoria', [CategoriaController::class, 'create']) -> name('categoria.create');
ROUTE::post('/store-categoria', [CategoriaController::class, 'store']) -> name('categoria.store');

//Situações
Route::get('/index-situacao', [SituacaoController::class, 'index']) ->name('situacao.index');
Route::get('/create-situacao', [SituacaoController::class, 'create']) ->name('situacao.create');
Route::post('/store-situacao', [SituacaoController::class, 'store']) ->name('situacao.store');

//Chamados 
Route::get('/index-chamado', [ChamadoController::class, 'index']) ->name('chamado.index');
Route::get('/create-chamado', [ChamadoController::class, 'create']) ->name('chamado.create');
Route::post('/store-chamado', [ChamadoController::class, 'store']) ->name('chamado.store');
Route::get('/show-chamado/{chamado}', [ChamadoController::class, 'show'])->name('chamado.show');
Route::delete('/destroy-chamado/{chamado}', [ChamadoController::class, 'destroy'])->name('chamado.destroy');
Route::put('/chamados/{chamado}/situacao', [ChamadoController::class, 'atualizarSituacao'])
->name('chamado.atualizar-situacao');




