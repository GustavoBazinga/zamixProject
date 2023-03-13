<?php

namespace App\Http\Controllers;

use App\Models\ListagemProdutos;
use App\Models\Requisicao;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequisicaoRequest;
use App\Http\Requests\UpdateRequisicaoRequest;
use App\Models\Produto;
use function Webmozart\Assert\Tests\StaticAnalysis\length;
use App\Models\ProdutoComposto;
use App\http\Controllers\ListagemProdutosController;

class RequisicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = Requisicao::all();
        $requisicoes = [];
        foreach ($requests as $request) {
            if ($request->funcionario == null) {
                $request->funcionario = "Não definido";
            }
            if ($request->status == null) {
                $request->status = "Pendente";
            } else if ($request->status == 0) {
                $request->status = "Recusando";
            } else if ($request->status == 1) {
                $request->status = "Concluído";
            }
        }
        return view('pages.request.index')->with('requests', $requests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $produtosCompostos = ProdutoComposto::all();
        return view('pages.request.create')->with('produtos', $produtos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequisicaoRequest $request)
    {
        Requisicao::create();
        $id = Requisicao::all()->last()->id;
        for ($i = 1; $i < count($request->all()) - 1; $i++) {
            try {
                if ($request->all()['quantidade' . $i] != 0) {
                    ListagemProdutosController::adicionarProduto($id, $request->all()['produto' . $i], $request->all()['quantidade' . $i]);
                }
            } catch (\Exception $e) {

            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $request = Requisicao::find($id);
        return view('pages.request.show')->with('request', $request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requisicao $requisicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequisicaoRequest $request, Requisicao $requisicao)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $requisicao = Requisicao::find($id);
        $requisicao->delete();
        return redirect()->route('request.index');
    }

    static public function getProdutosRequest($id)
    {
        $produtos = ListagemProdutos::where('requisicao_id', $id)->get();
        foreach ($produtos as $produto) {
            $produto->produto = Produto::find($produto->produto_id);
            $produto->produtoComposto = ProdutoComposto::find($produto->produto_composto_id);
        }
        return $produtos;
    }

    static public function executeRequest($id, $status)
    {
        $produtos = self::getProdutosRequest($id);
        $requisicao = Requisicao::find($id);
        if ($status) {
            foreach ($produtos as $produto) {
                if ($produto->produto != null) {
                    $produto->produto->quantidade -= $produto->quantidade;
                    $produto->produto->save();
                } else {
                    $produto->produtoComposto->quantidade -= $produto->quantidade;
                    $produto->produtoComposto->save();
                }
            }
        }
        else{
            $requisicao->status = false;
//            $requisicao->update($requisicao->toArray());
        }
       return $requisicao;
    }
}
