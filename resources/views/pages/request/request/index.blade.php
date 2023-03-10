@extends('layout.layout')

@section('content')
    @component('components.edit')
        @slot('title', 'Requisitar Produto')
        @slot('url', '')
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
                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

        @endslot
    @endcomponent


@endsection
