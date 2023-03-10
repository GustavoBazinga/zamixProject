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
        return view('pages.worker.index')->with('funcionarios', $funcionarios);
    }

    public function create()
    {
        return view('pages.worker.create');
    }

    public function store(Request $request)
    {
        Funcionario::create($request->all());
        return redirect()->route('worker.index');
    }

    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        return view('pages.worker.edit')->with('funcionario', $funcionario);
    }

    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->update($request->all());
        return redirect()->route('worker.index');
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->delete();
        return redirect()->route('worker.index');
    }
}
