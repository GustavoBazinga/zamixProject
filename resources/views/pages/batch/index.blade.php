@extends('layout.layout')

@section('content')
    @component('components.tableCrud')
        @slot('title', 'Lotes')
        @slot('pathCreate', route('batch.create'))
        @slot('headerItems')
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Custo Lote</th>
        @endslot
        @slot('bodyItems')
            @foreach($lotesSimples as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome_produto }}</td>
                    <td>{{ $item->quantidadeRecebida }}</td>
                    <td>{{ $item->precoLote }}</td>
                    <td>
                        <a href="{{ url('/batch/' . $item->id . '/edit') }}" title="Edit Batch"><button class="btn btn-primary btn-sm">Editar</button></a>
                        <form method="POST" action="{{ url('/batch' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Batch" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

    @component('components.tableCrud')
        @slot('title', 'Lotes Compostos')
        @slot('pathCreate', route('batch.create'))
        @slot('headerItems')
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Custo Lote</th>
        @endslot
        @slot('bodyItems')
            @foreach($lotesCompostos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->produtoComposto }}</td>
                    <td>{{ $item->quantidadeRecebida }}</td>
                    <td>{{ $item->precoLote }}</td>
                    <td>
                        <a href="{{ url('/batch/' . $item->id . '/edit') }}" title="Edit Batch"><button class="btn btn-primary btn-sm">Editar</button></a>
                        <form method="POST" action="{{ url('/batch' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Batch" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
