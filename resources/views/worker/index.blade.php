@extends('layout.layout')
<!-- Página principal de funcionario - GET -->
@section('content')
    <!-- Componente de tabela -->
    @component('components.tableCrud')
        <!-- Dados especificos do header -->
        @slot('title', 'Funcionários')
        @slot('pathCreate', route('worker.create'))
        @slot('headerItems')
            <th>Nome</th>
            <th>CPF</th>
        @endslot
        <!-- Dados especificos do body -->
        @slot('bodyItems')
            @foreach($funcionarios as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cpf }}</td>
                    <!-- Botões de editar e apagar -->
                    <td>
                        {{--                        <a href="{{ url('/product/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--}}
                        <a href="{{ url('/worker/' . $item->id . '/edit') }}" title="Edit Worker"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</button></a>
                        <form method="POST" action="{{ url('/worker' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
