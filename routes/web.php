<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EstoqueController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('/product', ProdutoController::class);
Route::resource('/worker', FuncionarioController::class);
Route::resource('/stock', EstoqueController::class);
//Route::resource('/produtos', ProdutoController::class);
