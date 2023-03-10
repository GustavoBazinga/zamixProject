@extends('layout.layout')

<!--# Página de criar um novo produto - POST-->
@section('content')
    @component('components.create')

        @slot('title', 'Lotes')
        @slot('url', route('batch.store'))
        @slot('pathIndex', route('batch.index'))

        @slot('formInput')
            <div class="form-group">
                <label for="produto_id">Produto</label>
                <select class="form-control" name="produto_id" id="produto_id">
                    <option value="" selected></option>
                    @foreach($produtos as $produto)
                        <option value="{{$produto->id}}">{{$produto->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantidadeRecebida">Quantidade</label>
                <input type="number" class="form-control" name="quantidadeRecebida" id="quantidadeRecebida" placeholder="Quantidade do produto" value=0>
            </div>


            <div class="form-group">
                <label for="precoLote">Preço Lote</label>
                <input type="number" min="0" step="0.01" class="form-control" name="precoLote" id="precoLote" placeholder="Preço Total do Lote">
            </div>

        @endslot
    @endcomponent


@endsection

