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
        return "Hello World create";
    }
}
