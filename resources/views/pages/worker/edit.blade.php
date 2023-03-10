@extends('layout.layout')
{{--# Página principal de funcionario - GET--}}
@section('content')
    @component('components.edit')
        @slot('title', 'Editar Funcionário')
        @slot('url', route('worker.update', $funcionario->id))
        @slot('formInput')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ $funcionario->nome }}" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" value="{{ $funcionario->cpf }}" class="form-control" placeholder="Nome">
            </div>
        @endslot
    @endcomponent

@endsection

