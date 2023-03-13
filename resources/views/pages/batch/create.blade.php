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
                    <optgroup label="Produtos Simples">
                        @foreach($produtos as $produto)
                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Produtos Compostos">
                        @foreach($produtosCompostos as $produto)
                            <option value="PC-{{$produto->id}}">{{$produto->nome}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
            <div class="form-group">
                <label for="quantidadeRecebida">Quantidade</label>
                <input type="number" class="form-control" name="quantidadeRecebida" id="quantidadeRecebida" placeholder="Quantidade do produto" value=0>
            </div>
        @endslot
    @endcomponent


@endsection

