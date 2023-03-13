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
                    <a type="submit" class="btn btn-success" onclick="tratarRequisicao({{$request->id}}, true)">Atender</a>
                    <a type="submit" class="btn btn-danger" onclick="tratarRequisicao({{$request->id}},false)">Cancelar</a>
                @elseif ($request->status == 1)
                    <input type="text" class="mb-1  form-control" id="nome" name="nome" value="Atendida" disabled>
                    <a type="submit" class="btn btn-success" onclick="tratarRequisicao({{$request->id}},true)" disabled>Atender</a>
                    <a type="submit" class="btn btn-danger" onclick="tratarRequisicao({{$request->id}},false)">Cancelar</a>
                @else
                    <input type="text" class="mb-1 form-control" id="nome" name="nome" value="Cancelada" disabled>
                    <a type="submit" class="btn btn-success" onclick="tratarRequisicao({{$request->id}},true)">Atender</a>
                    <a type="submit" class="btn btn-danger" onclick="tratarRequisicao({{$request->id}},false)" disabled>Cancelar</a>
                @endif
            </div>
            <div id="returnAcaoRequisicao">

            </div>
            <div id="mountPage">

            </div>
        @endslot


    @endcomponent
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script>
        const divProdutos = document.querySelector('#mountPage');
        divProdutos.addEventListener('load', mountRequestList({{$request->id}}));
    </script>
@endsection
