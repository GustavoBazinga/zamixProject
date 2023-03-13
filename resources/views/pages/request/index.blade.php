@extends('layout.layout')

@section('content')
    @component('components.tableCrud')
        @slot('title','Requisições')
        @slot('pathCreate', route('request.create'))
        @slot('headerItems')
            <th style="width: 2%">Status</th>
            <th>Data Criação</th>
            <th>Data Atualização</th>
            <th>Funcionário</th>
        @endslot
        @slot('bodyItems')
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->status }}</td>
                    <td>{{ $request->created_at }}</td>
                    <td>{{ $request->updated_at }}</td>
                    <td>{{ $request->funcionario }}</td>
                    <td>
                        <a href="{{ url('request/' . $request->id) }}" title="Ver Requisição"><button class="btn btn-info btn-sm">Ver</button></a>
                        <a href="{{ url('/request/' . $request->id . '/edit') }}" title="Editar Requisição"><button class="btn btn-primary btn-sm">Editar</button></a>
                        <form method="POST" action="{{ url('/request' . '/' . $request->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Apagar Requisição" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Apagar</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        @endslot
    @endcomponent
@endsection
