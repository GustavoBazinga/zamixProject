<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoteRequest;
use App\Http\Requests\UpdateLoteRequest;
use App\Models\Produto;
use App\Models\Lote;
use App\http\Controllers\ProdutoController;
use App\Models\ProdutoProdutoComposto;
use Illuminate\Http\Request;
use App\Models\ProdutoComposto;
use App\Http\Controllers\ProdutoProdutoCompostoController;


class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotesSimples = Lote::where('produto_id', '!=', null)->get();
        for ($i = 0; $i < count($lotesSimples); $i++) {
            $lotesSimples[$i]["nome_produto"] = ProdutoController::getNomeProduto($lotesSimples[$i]->produto_id);
        }
        $lotesCompostos = Lote::where('produto_composto_id', '!=', null)->get();
        for ($i = 0; $i < count($lotesCompostos); $i++) {
            $lotesCompostos[$i]->produtoComposto = ProdutoCompostoController::getNomeProdutoComposto($lotesCompostos[$i]->produto_composto_id);
        }
        // Merge the two arrays
        $lotes = $lotesSimples->merge($lotesCompostos);

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
        if (str_contains($request->produto_id, 'PC-')) {

            $request->produto_id = str_replace('PC-', '', $request->produto_id);
            Lote::create([
                'produto_id' => null,
                'produto_composto_id' => $request->produto_id,
                'quantidadeRecebida' => $request->quantidadeRecebida,
                'precoLote' => $request->precoLote
            ]);
            $produtos = ProdutoProdutoCompostoController::getAllProdutos($request, $request->produto_id);

            for($i = 0; $i < count($produtos); $i++) {
                $produto = Produto::where('nome', $produtos[$i][0])->get();
                ProdutoController::updateQuantidade($request, $produto[0]->id, $produtos[$i][1] * $request->quantidadeRecebida);
            }
        }else{
            Lote::create([
                'produto_id' => $request->produto_id,
                'produto_composto_id' => null,
                'quantidadeRecebida' => $request->quantidadeRecebida,
                'precoLote' => $request->precoLote
            ]);
            ProdutoController::updateQuantidade($request, $request->produto_id, $request->quantidadeRecebida);
        }


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
