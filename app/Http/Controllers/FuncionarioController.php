<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('worker.index')->with('funcionarios', $funcionarios);
    }

    public function create()
    {
        return "Hello World create";
    }
}
