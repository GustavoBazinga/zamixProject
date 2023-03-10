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
        return view('product.index')->with('produtos', $produtos);
    }

    public function create()
    {
        $produto = new Produto();
        return view('product.create', compact("produto"));
    }

    public function store(Request $request)
    {

        Produto::create($request->all());
        return redirect()->route('product.index');
    }


    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('product.edit')->with('produto', $produto);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->update($request->all());
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('product.index');
    }
}
