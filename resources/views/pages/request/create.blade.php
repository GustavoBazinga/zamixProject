@extends('layout.layout')

@section('content')
    @component('components.create')
        @slot('title', 'Criar Requisição')
        @slot('url', route('request.store'))
        @slot('formInput')
            <div class="form-group">
                <h3>Lista de Produtos</h3>
                <button type="button" class="btn btn-primary btn-sm" id="btnAdd" onclick="getProdutoList()">Adicionar Produto</button>

            </div>
            <div id="mountPage">

            </div>
        @endslot

    @endcomponent
    <script src="{{ asset('js/scripts.js')}}"></script>
{{--    <script>--}}
{{--        const divProdutos = document.querySelector('#mountPage');--}}
{{--        divProdutos.addEventListener('load', mountRequestPage());--}}
{{--    </script>--}}
@endsection
