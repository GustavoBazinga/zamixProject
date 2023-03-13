@extends('layout.layout')
<!-- Página de criar um novo produto - POST -->
@section('content')
    <!-- Componente de criar -->
    @component('components.create')
        <!-- Dados especificos do header -->
        @slot('title', 'Produto')
        @slot('url', route('product.store', ))
        @slot('pathIndex', route('product.index'))
        <!-- Dados especificos dos inputs -->
        @slot('formInput')
            <!-- Radiobutton para selecionar entre Simples e Composto -->
            <div class="form-check">
                <input class="form-check-input" value=1 type="radio" name="produtosRadio" id="produtoSimples" checked onchange="alteraTipo(this.value)">
                <label class="form-check-label" for="produtoSimples">
                    Produto Simples
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value=2 type="radio" name="produtosRadio" id="produtoComposto" onchange="alteraTipo(this.value)">
                <label class="form-check-label" for="produtoComposto">
                    Produto Composto
                </label>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do produto" value="{{old('nome', $produto->nome)}}">
            </div>

            <div id="mountPage">
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="Quantidade do produto" value=0 disabled>
                </div>
                <div class="form-group">
                    <label for="precoCusto">Preço Custo</label>
                    <input type="number" min="0" step="0.01" class="form-control" name="precoCusto" id="precoCusto" placeholder="Preço de custo do produto">
                </div>
                <div class="form-group">
                    <label for="precoVenda">Preço Venda</label>
                    <input type="number" min="0" step="0.01" class="form-control" name="precoVenda" id="precoVenda" placeholder="Preço de venda do produto">
                </div>
            </div>

        @endslot
    @endcomponent
    <script src="{{ asset('js/scripts.js')}}"></script>
@endsection

