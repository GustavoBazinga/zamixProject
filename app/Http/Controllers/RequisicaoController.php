<?php

namespace App\Http\Controllers;

use App\Models\Requisicao;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequisicaoRequest;
use App\Http\Requests\UpdateRequisicaoRequest;
use App\Models\Produto;

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
            }else if ($request->status == 0) {
                $request->status = "Recusando";
            }else if ($request->status == 1) {
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
        return view('pages.request.create')->with('produtos', $produtos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequisicaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Requisicao $requisicao)
    {
        //
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
        //
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
}
