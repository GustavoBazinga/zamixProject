@extends('layout.layout')

@section('content')
    @component('components.tableCrud')
        @slot('title','Requisições')
        @slot('pathCreate', route('request.create'))
        @slot('headerItems')
            <th>Data Criação</th>
            <th>Data Atualização</th>
        @endslot
        @slot('bodyItems')
            @foreach ($requests as $request)
                <tr> '
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->created_at }}</td>
                    <td>{{ $request->updated_at }}</td>
                    <td>
                        <a href="{{ route('request.show', $request->id) }}" class="btn btn-primary btn-sm" title="Visualizar">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('request.edit', $request->id) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <form method="POST" action="{{ route('request.destroy', $request->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Deletar" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
