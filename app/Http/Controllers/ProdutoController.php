<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('pages.product.index')->with('produtos', $produtos);
    }

    static public function getProdutos($id)
    {
        $dados = Produto::all();
        return response()->json($dados);
    }
    public function create()
    {
        $produto = new Produto();
        return view('pages.product.create', compact("produto"));
    }

    public function store(Request $request)
    {
        Produto::create($request->all());
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

    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('product.index');
    }
}
