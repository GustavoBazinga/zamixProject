<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoComposto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdutoCompostoRequest;
use App\Http\Requests\UpdateProdutoCompostoRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;

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
        ]);
        ProdutoProdutoCompostoController::store($request, $produtoComposto->id);
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $produtoComposto = ProdutoComposto::find($id);
        return view('pages.product.show')->with('produto', $produtoComposto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdutoComposto $produtoComposto)
    {
        //
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
