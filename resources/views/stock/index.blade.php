@extends('layout.layout')
<!-- Página de listar todos os produtos - GET -->
@section('content')
    <!-- Componente de listar -->
    @component('components.tableCrud')
        <!-- Dados especificos do header -->
        @slot('title', 'Estoque')
        @slot('pathCreate', route('stock.create'))
        @slot('headerItems')
            <th>Quantidade Recebida</th>
            <th>Quantidade Restante</th>
            <th>Produto</th>
        @endslot
        <!-- Dados especificos do body -->
        @slot('bodyItems')
            @foreach($estoques as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->quantidadeRebecimento }}</td>
                    <td>{{ $item->quantidadeRestante }}</td>
                    <td>{{ $item->produto->nome }}</td>
                    <!-- Botões de editar e apagar -->
                    <td>
                        <a href="{{ url('/stock/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</button></a>
                        <form method="POST" action="{{ url('/stock' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
