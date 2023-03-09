<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function create()
    {
        return "Hello World create";
    }
}
