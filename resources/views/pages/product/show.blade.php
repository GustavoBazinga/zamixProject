@extends('layout.layout')

@section('content')
    @component('components.show')
        @slot('title', 'Visualizar Produto')
        @slot('editPath', route('product.edit', $produto->id))
        @slot('inputs')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" disabled>
            </div>

            <label for="divProdutos">Produtos</label>
            <div name="divProdutos" onload="mountProductCompsite({{$produto->id}})">

            </div>
        @endslot
        <script src="{{ asset('js/scripts.js')}}"></script>
    @endcomponent
@endsection
