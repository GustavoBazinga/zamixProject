@extends('layout.layout')
<!-- Página de criar um novo produto - POST -->
@section('content')
    <!-- Componente de criar -->
    @component('components.create')
        <!-- Dados especificos do header -->
        @slot('title', 'Produto')
        @slot('url', route('product.store'))
        @slot('pathIndex', route('product.index'))
        <!-- Dados especificos dos inputs -->
        @slot('formInput')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do produto" value="{{old('nome', $produto->nome)}}">
            </div>
            <div class="form-group">
                <label for="precoCusto">Preço Custo</label>
                <input type="text" class="form-control" name="precoCusto" id="precoCusto" placeholder="Preço de custo do produto" value="{{old('precoCusto', $produto->precoCusto)}}">
            </div>
            <div class="form-group">
                <label for="precoVenda">Preço Venda</label>
                <input type="text" class="form-control" name="precoVenda" id="precoVenda" placeholder="Preço de venda do produto" value="{{old('precoVenda', $produto->precoVenda)}}">
            </div>
        @endslot
    @endcomponent
@endsection
