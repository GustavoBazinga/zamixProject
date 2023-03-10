<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    public function index()
    {
        $estoques = Estoque::all();
        return view('stock.index')->with('estoques', $estoques);
    }

    public function create()
    {
        return "Hello World create";
    }
}
