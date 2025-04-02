<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SituacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Categorias 
ROUTE::get('/index-categoria', [CategoriaController::class, 'index']) -> name('categoria.index');
ROUTE::get('/create-categoria', [CategoriaController::class, 'create']) -> name('categoria.create');
ROUTE::post('/store-categoria', [CategoriaController::class, 'store']) -> name('categoria.store');

//Situações
Route::get('/index-situacao', [SituacaoController::class, 'index']) ->name('situacao.index');
Route::post('/create-situacao', [SituacaoController::class, 'create']) ->name('situacao.create');
Route::post('/store-situacao', [SituacaoController::class, 'store']) ->name('situacao.store');

