<?php

namespace App\Http\Controllers;

use App\Models\ListagemProdutos;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListagemProdutosRequest;
use App\Http\Requests\UpdateListagemProdutosRequest;

class ListagemProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListagemProdutosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ListagemProdutos $listagemProdutos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListagemProdutos $listagemProdutos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListagemProdutosRequest $request, ListagemProdutos $listagemProdutos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListagemProdutos $listagemProdutos)
    {
        //
    }

    public static function adicionarProduto($id, $produto, $quantidade){
        if (str_contains($quantidade, 'PC-')) {
            $quantidade = substr($quantidade, 3);
            dd($quantidade);
        }

    }
}
