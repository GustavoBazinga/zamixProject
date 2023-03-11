<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoteRequest;
use App\Http\Requests\UpdateLoteRequest;
use App\Models\Produto;
use App\Models\Lote;
use App\http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use App\Models\ProdutoComposto;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotes = Lote::all();
        return view('pages.batch.index')->with('lotes', $lotes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $produtosCompostos = ProdutoComposto::all();
        return view('pages.batch.create')->with('produtos', $produtos)->with('produtosCompostos', $produtosCompostos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoteRequest $request)
    {
        Lote::create([
            'produto_id' => $request->produto_id,
            'quantidadeRecebida' => $request->quantidadeRecebida,
            'precoLote' => $request->precoLote
        ]);
        ProdutoController::updateQuantidade($request, $request->produto_id, $request->quantidadeRecebida);

        return redirect()->route('batch.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lote $lote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lote $lote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoteRequest $request, Lote $lote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lote $lote)
    {
        //
    }
}
