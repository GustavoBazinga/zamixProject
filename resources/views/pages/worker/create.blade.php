@extends('layout.layout')
{{--# Página de criar um novo funcionário - POST--}}
@section('content')
    @component('components.create')
        @slot('title', 'Funcionário')
        @slot('url', route('worker.store'))
        @slot('pathIndex', route('worker.index'))

        @slot('formInput')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do produto">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF do Funcionário">
            </div>
        @endslot
    @endcomponent
@endsection
