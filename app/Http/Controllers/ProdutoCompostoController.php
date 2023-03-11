<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoComposto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdutoCompostoRequest;
use App\Http\Requests\UpdateProdutoCompostoRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use App\Models\ProdutoProdutoComposto;

class ProdutoCompostoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.product.productComposite.index', [
            'productComposed' => ProdutoComposto::all(),
        ]);
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
    static public function store(HttpRequest $request)
    {
        $produtoComposto = ProdutoComposto::create([
            'nome' => $request->nome,
            'precoCusto' => $request->precoCusto,
            'precoVenda' => $request->precoVenda,
        ]);
        ProdutoProdutoCompostoController::store($request, $produtoComposto->id);
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $produtoComposto = ProdutoComposto::find($id);
        $produtoProdutoComposto = ProdutoProdutoComposto::where('produto_composto_id', $id)->get();
        return view('pages.product.show')->with('produto', $produtoComposto)->with('produtoProdutoComposto', $produtoProdutoComposto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdutoComposto $produtoComposto)
    {
        //
    }

    static function getNomeProdutoComposto($id)
    {
        $produto = ProdutoComposto::find($id);
        return $produto->nome;
    }

    static public function getSubProdutos($id)
    {
        $dados = ProdutoProdutoComposto::where('produto_composto_id', $id)->get();
        for ($i = 0; $i < count($dados); $i++) {
            $dados[$i]->nome = ProdutoController::getNomeProduto($dados[$i]->produto_id);
        }
        return $dados;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoCompostoRequest $request, ProdutoComposto $produtoComposto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdutoComposto $produtoComposto)
    {
        //
    }
}
