<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\ProdutoCompostoController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('/product', ProdutoController::class);
Route::resource('/worker', FuncionarioController::class);
Route::resource('/batch', LoteController::class);
Route::resource('/product-composite', ProdutoCompostoController::class);
