<?php

namespace App\Http\Controllers;

use App\Models\FuncionarioProduto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFuncionarioProdutoRequest;
use App\Http\Requests\UpdateFuncionarioProdutoRequest;
use App\Models\Produto;
use App\Models\ProdutoComposto;

class FuncionarioProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.request.home');
    }

    public function index_request()
    {
        $Produtos = Produto::all();
        $ProdutosCompostos = ProdutoComposto::all();
        return view('pages.request.request.index')->with('produtos', $Produtos)->with('produtosCompostos', $ProdutosCompostos);
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
    public function store(StoreFuncionarioProdutoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FuncionarioProduto $funcionarioProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FuncionarioProduto $funcionarioProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFuncionarioProdutoRequest $request, FuncionarioProduto $funcionarioProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FuncionarioProduto $funcionarioProduto)
    {
        //
    }
}
