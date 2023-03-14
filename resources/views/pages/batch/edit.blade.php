@extends('layout.layout')

@section('content')
    @component('components.edit')
        @slot('title', 'Editar Lote')
        @slot('url', route('batch.update', $lote->id))
        @slot('formInput')
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" name="id" id="id" value="{{ $lote->id }}" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="produto">Produto</label> <span class="aviso">Não é possível alterar o produto</span>
                <input type="text" name="produto" id="produto" value="{{ $produto }}" class="form-control" placeholder="Nome" disabled>
            </div>
            <div class="form-group">
                <label for="quant">Quantidade</label> <span class="aviso">Coloque 0 para exluir o lote</span>
                <input type="number" name="quant" id="quant" value="{{ $lote->quantidadeRecebida }}" class="form-control" placeholder="Nome">
            </div>

        @endslot
        @endcomponent
@endsection
