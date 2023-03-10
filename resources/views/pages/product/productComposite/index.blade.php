@extends('layout.layout')

@section('content')

    @component('components.tableCrud')
        @slot('title', 'Produtos Compostos')
        @slot('pathCreate', route('product.create'))
        @slot('headerItems')
            <th>Nome</th>
        @endslot
        @slot('bodyItems')
            @foreach($productComposed as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>
                        <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm">Editar</button></a>
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
@stop
