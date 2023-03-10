<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\ProdutoCompostoController;
use App\Http\Controllers\FuncionarioProdutoController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('/product', ProdutoController::class);
Route::resource('/worker', FuncionarioController::class);
Route::resource('/batch', LoteController::class);
Route::resource('/product-composite', ProdutoCompostoController::class);

Route::get('/request/request', [FuncionarioProdutoController::class, 'index_request'])->name('request.index_request');

Route::resource('/request', FuncionarioProdutoController::class);
