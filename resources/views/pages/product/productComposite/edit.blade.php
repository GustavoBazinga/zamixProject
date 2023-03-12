@extends('layout.layout')

@section('content')
    @component('components.edit')
        @slot('title', 'Editar Produto Composto')
        @slot('url', route('product-composite.update', $produtoComposto->id))
        @slot('formInput')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ $produtoComposto->nome }}" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="precoCusto">Preço de Custo</label>
                <input type="number" min="1" step="0.01" name="precoCusto" id="precoCusto" value="{{ $produtoComposto->precoCusto }}" class="form-control" placeholder="Preço Custo">
            </div>
            <div class="form-group">
                <label for="precoVenda">Preço de Venda</label>
                <input type="number" min="1" step="0.01" name="precoVenda" id="precoVenda" value="{{ $produtoComposto->precoVenda }}" class="form-control" placeholder="Preço Venda">
            </div>

            <div id="mountPage">

            </div>
        @endslot
    @endcomponent
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script>
        const divProdutos = document.querySelector('#mountPage');
        divProdutos.addEventListener('load', mountProductCompsite({{ $produtoComposto->id }}, true));
    </script>
@endsection
