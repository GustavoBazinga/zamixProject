@extends('layout.layout')

@section('content')
    @component('components.tableCrud')
        @slot('title', 'Produtos')
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
{{--                        <a href="{{ url('/product/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--}}
                        <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
