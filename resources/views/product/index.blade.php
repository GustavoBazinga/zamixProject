@extends('layout.layout')

@section('content')
    @component('components.tableCrud')
        @slot('title', 'Produtos')
        @slot('pathCreate', route('product.create'))
        @slot('headerItems')
            <th>Nome</th>
            <th>Preço Custo</th>
            <th>Preço Venda</th>
        @endslot
        @slot('bodyItems')
            @foreach($produtos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->precoCusto }}</td>
                    <td>{{ $item->precoVenda }}</td>
                    <td>
                        <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</button></a>
                        <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
