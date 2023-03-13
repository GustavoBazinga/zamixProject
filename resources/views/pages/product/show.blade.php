@extends('layout.layout')

@section('content')
    @component('components.show')
        @slot('title', 'Visualizar Produto')
        @slot('editPath', route('product-composite.edit', $produto))
        @slot('inputs')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" disabled>
            </div>
            <div id="mountPage">

            </div>
        @endslot

    @endcomponent
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script>
        const divProdutos = document.querySelector('#mountPage');
        divProdutos.addEventListener('load', mountProductCompsite({{ $produto->id }}));
    </script>
@endsection
