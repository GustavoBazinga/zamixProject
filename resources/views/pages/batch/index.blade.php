@extends('layout.layout')

@section('content')
    @component('components.tableCrud')
        @slot('title', 'Lotes')
        @slot('pathCreate', route('batch.create'))
        @slot('headerItems')
{{--            <th>ID</th>--}}
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preco de Custo</th>
            <th>Preco de Venda</th>
        @endslot
        @slot('bodyItems')
            @foreach($lotes as $item)
                <tr>
{{--                    <td>{{ $loop->iteration }}</td>--}}
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome_produto ?? $item->produtoComposto}}</td>
                    <td>{{ $item->quantidadeRecebida }}</td>
                    <td>R${{  $item->precoCusto }}</td>
                    <td>R${{ $item->precoVenda }}</td>
                    <td>
                        <a href="{{ url('/batch/' . $item->id . '/edit') }}" title="Edit Batch"><button class="btn btn-primary btn-sm">Editar</button></a>
                        <form method="POST" action="{{ url('/batch' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Batch" onclick="return confirm(&quot;Confirma exclusão??&quot;)">Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection
