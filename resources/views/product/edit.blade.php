@extends('layout.layout')

@section('content')
@component('components.edit')
    @slot('title', 'Editar Produto')
    @slot('url', route('product.update', $produto->id))
    @slot('formInput')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ $produto->nome }}" class="form-control" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="precoCusto">Preço de Custo</label>
            <input type="text" name="precoCusto" id="precoCusto" value="{{ $produto->precoCusto }}" class="form-control" placeholder="Preço Custo">
        </div>
        <div class="form-group">
            <label for="precoVenda">Preço de Venda</label>
            <input type="text" name="precoVenda" id="precoVenda" value="{{ $produto->precoVenda }}" class="form-control" placeholder="Preço Venda">
        </div>
    @endslot
@endcomponent
@stop
