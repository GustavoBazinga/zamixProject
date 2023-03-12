@extends('layout.layout')
<!-- Página principal de produto - GET -->
@section('content')


    <!-- Componente da tabela -->
    @component('components.tableCrud')

        <!-- Dados especificos do header tabela -->
        @slot('title', 'Produtos')
        @slot('pathCreate', route('product.create'))
        @slot('headerItems')
            <th style="width: 40%">Nome</th>
            <th>Preço Custo</th>
            <th>Preço Venda</th>
            <th>Quantidade</th>
        @endslot
        <!-- Dados especificos do body tabela -->
        @slot('bodyItems')
            @foreach($produtos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>R$ {{ $item->precoCusto }}</td>
                    <td>R$ {{ $item->precoVenda }}</td>
                    <td>{{ $item->quantidade }}</td>
                    <!-- Botões de editar e apagar -->
                    <td>
                        <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Editar Produto"><button class="btn btn-primary btn-sm">Editar</button></a>
                        <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Apagar Produto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

    @component('components.tableCrud')
        @slot('title', 'Produtos Compostos')
        @slot('pathCreate', route('product.create'))
        @slot('headerItems')
            <th style="width: 70%">Nome</th>
        @endslot
        @slot('bodyItems')
            @foreach($produtosCompostos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>
                        <a href="{{ url('product-composite/'. $item->id) }}" title="Ver Produto"><button class="btn btn-info btn-sm">Ver</button></a>
                        <a href="{{ url('/product-composite/' . $item->id . '/edit') }}" title="Editar Produto"><button class="btn btn-primary btn-sm">Editar</button></a>
                        <form method="POST" action="{{ url('/product-composite' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Apagar Produto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection

