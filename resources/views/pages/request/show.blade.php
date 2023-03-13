@extends('layout.layout')

@section('content')
    @component('components.show')
        @slot('title', 'Visualizar Requisição')
        @slot('editPath', route('request.edit', $request))
        @slot('inputs')

            <div class="form-group">
                <label for="nome">Status</label>
                @if ($request->status == null)
                    <input type="text" class="mb-1 form-control" id="nome" name="nome" value="Aguardando" disabled>
                @elseif ($request->status == 1)
                    <input type="text" class="mb-1  form-control" id="nome" name="nome" value="Atendida" disabled>
                @else
                    <input type="text" class="mb-1 form-control" id="nome" name="nome" value="Cancelada" disabled>
                @endif
            </div>
            <div id="returnAcaoRequisicao">

            </div>
            <div id="mountPage">

            </div>
            <label for="total">Total da Venda</label>
            <input type="text" class="mb-1 form-control" id="total" name="total" value="R$ {{$total}}" disabled>
            <div class="form-group">
                <label for="funcionario">Funcionário</label>
                <select class="form-control" name="funcionario" id="funcionario">
                    <option value="0">Selecione um funcionario</option>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                @if ($request->status == null)
                    <a type="submit" class="btn btn-success" onclick="tratarRequisicao({{$request->id}}, true)">Atender</a>
                    <a type="submit" class="btn btn-danger" onclick="tratarRequisicao({{$request->id}},false)">Cancelar</a>
                @elseif ($request->status == 1)

                    <a type="submit" class="btn btn-success" onclick="tratarRequisicao({{$request->id}},true)" disabled>Atender</a>
                    <a type="submit" class="btn btn-danger" onclick="tratarRequisicao({{$request->id}},false)">Cancelar</a>
                @else
                    <a type="submit" class="btn btn-success" onclick="tratarRequisicao({{$request->id}},true)">Atender</a>
                    <a type="submit" class="btn btn-danger" onclick="tratarRequisicao({{$request->id}},false)" disabled>Cancelar</a>
                @endif
            </div>

            </div>

        @endslot


    @endcomponent
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script>
        const divProdutos = document.querySelector('#mountPage');
        divProdutos.addEventListener('load', mountRequestList({{$request->id}}));
    </script>
@endsection
