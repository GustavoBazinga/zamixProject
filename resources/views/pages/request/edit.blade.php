@extends('layout.layout')

@section('contents')
    @component('components.edit')
        @slot('title', 'Editar Requisição')
        @slot('url', route('request.update', $request->id))
{{--        @slot('path', route('request.update', $request->id))--}}
        @slot('formInput')
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="Aguardando" {{ $request->status == 'Aguardando' ? 'selected' : '' }}>Aguardando</option>
                    <option value="Em andamento" {{ $request->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                    <option value="Finalizado" {{ $request->status == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="funcionario">Funcionário</label>
                <select class="form-control" id="funcionario" name="funcionario">
                    @foreach ($workers as $worker)
                        <option value="{{ $worker->id }}" {{ $request->funcionario == $worker->id ? 'selected' : '' }}>{{ $worker->name }}</option>
                    @endforeach
                </select>
            </div>
        @endslot
    @endcomponent
@endsection
