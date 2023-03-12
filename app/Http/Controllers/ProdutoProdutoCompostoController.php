<?php

namespace App\Http\Controllers;

use App\Models\ProdutoProdutoComposto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdutoProdutoCompostoRequest;
use App\Http\Requests\UpdateProdutoProdutoCompostoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\UpdateProdutoCompostoRequest;
use App\Models\ProdutoComposto;

class ProdutoProdutoCompostoController extends Controller
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
    static public function store(Request $request, $id)
    {
        $cont = 0;
        for($i = 5; $i < count($request->all()); $i += 2) {
            $index = ($i - 5)/2 + 1;
            $produto = ProdutoProdutoComposto::create([
                'produto_composto_id' => $id,
                'produto_id' => $request->all()["produto$index"],
                'quantidade' => $request->all()["quantidade$index"],
            ]);
        }
        redirect()->route('product.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(ProdutoProdutoComposto $produtoProdutoComposto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
//        dd($request->all());
        $cont = 0;
        for($i = 5; $i < count($request->all()); $i += 2) {
            $index = ($i - 5)/2 + 1;
            $produto = ProdutoProdutoComposto::create([
                'produto_composto_id' => $id,
                'produto_id' => $request->all()["produto$index"],
                'quantidade' => $request->all()["quantidade$index"],
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    static public function update($request, ProdutoComposto $produtoProdutoComposto, $id)
    {
        for($i = 1; $i < count($request); $i++) {
            try{
                $quant = $request["quantidade$i"];
                $produtoId = $request["produto$i"];
                if ($quant == 0) {
                    $produto = ProdutoProdutoComposto::where('produto_composto_id', $id)->get();
                    for($j = 0; $j < count($produto); $j++) {
                        if($produto[$j]->produto_id == $produtoId) {
                            $produto[$j]->delete();
                        }
                    }
                    continue;
                }
                if(str_contains($produtoId, '#')) {
                    $produtoId = explode('#', $produtoId)[1];
                    ProdutoProdutoComposto::create([
                        'produto_composto_id' => $id,
                        'produto_id' => $produtoId,
                        'quantidade' => $quant,
                    ]);
                }
                $produto = ProdutoProdutoComposto::where('produto_composto_id', $id)->get();
                for($j = 0; $j < count($produto); $j++) {
                    if($produto[$j]->produto_id == $produtoId) {
                        $produto[$j]->quantidade = $quant;
                        $produto[$j]->save();
                    }
                }


            }
            catch(\Exception $e) {

            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdutoProdutoComposto $produtoProdutoComposto)
    {

    }
    static public function getAllProdutos(Request $request, $id)
    {
        $produtos_id = ProdutoProdutoComposto::where('produto_composto_id', $id)->get();
        $produtos = [];
        for($i = 0; $i < count($produtos_id); $i++) {
            $produtoBruto = Produto::where('id', $produtos_id[$i]->produto_id)->get();
            $produtos[$i] = [
                $produtoBruto[0]->nome,
                $produtos_id[$i]->quantidade
            ];
        }
        return $produtos;
    }

}
