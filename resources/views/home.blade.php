@extends('layout.layout')

@section('content')
    <!-- Página home com painel para cada CRUD -->
    <div class="containerHome">
        <div class="row">
            <div class="col-3">
                <div class="card  align-items-center" style="width: 18rem;">
                    <img src="{{ asset('images/iconProduct.png') }}" class="card-img-top sizeCardImage" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Produtos</h5>
                        <p class="card-text">Visualização, criação, edição e exclusão de produtos.</p>
                        <a href="/product" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card  align-items-center" style="width: 18rem;">
                    <img src="{{ asset('images/iconWorkers.png') }}" class="card-img-top sizeCardImage" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Funcionários</h5>
                        <p class="card-text">Visualização, criação, edição e exclusão de funcionários.</p>
                        <a href="/worker" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card  align-items-center" style="width: 18rem;">
                    <img src="{{ asset('images/iconStock.png') }}" class="card-img-top sizeCardImage" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lotes</h5>
                        <p class="card-text">Visualização, criação, edição e exclusão de lotes.</p>
                        <a href="/batch" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card  align-items-center" style="width: 18rem;">
                    <img src="{{ asset('images/iconRequest.png') }}" class="card-img-top sizeCardImage" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Requisições</h5>
                        <p class="card-text">Visualização, criação, edição e exclusão de Requisições.</p>
                        <a href="/request" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-2">
                <a type="button" href="" class="btn btn-primary">Relatórios</a>
            </div>
            <div class="col-4">

            </div>
        </div>

    </div>

@endsection
