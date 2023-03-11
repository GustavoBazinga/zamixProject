@extends('layout.layout')

@section('content')
    @slot('onloadPath', 'mountProductCompsite({{ $produto->id }})')
    @component('components.show')
        @slot('title', 'Visualizar Produto')
        @slot('editPath', route('product.edit', $produto->id))
        @slot('inputs')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" disabled>
            </div>
            <div name="divProdutos" id="divProdutos">

            </div>
        @endslot

    @endcomponent
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script>
        console.log('teste');
        const divProdutos = document.querySelector('#divProdutos');
        divProdutos.addEventListener('load', mountProductCompsite({{ $produto->id }}));
    </script>
@endsection
