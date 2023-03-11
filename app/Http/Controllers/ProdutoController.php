<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\ProdutoComposto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $produtosCompostos = ProdutoComposto::all();
        return view('pages.product.index')->with('produtos', $produtos)->with('produtosCompostos', $produtosCompostos);
    }

    static public function getProdutos()
    {
        $dados = Produto::all();
        return $dados;
    }


    public function create()
    {
        $produto = new Produto();
        return view('pages.product.create')->with('produto', $produto);
    }

    public function store(Request $request)
    {
        $type = $request->produtosRadio;
        if ($type == 1){
            Produto::create([
                'nome' => $request->nome,
                'quantidade' => 0,
                'precoCusto' => $request->precoCusto,
                'precoVenda' => $request->precoVenda,
            ]);

        } else {
            ProdutoCompostoController::store($request);
        }
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('pages.product.edit')->with('produto', $produto);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->update($request->all());
        return redirect()->route('product.index');
    }

    static function updateQuantidade(Request $request, $id, $quantidade = 0)
    {
        $produto = Produto::find($id);
        $produto->quantidade = $produto->quantidade + $quantidade;
        $produto->update($request->all());
    }

    static function getNomeProduto($id)
    {
        $produto = Produto::find($id);
        return $produto->nome;
    }

    public function destroy($id)
    {

        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('product.index');
    }
}
