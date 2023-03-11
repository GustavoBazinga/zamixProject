@extends('layout.layout')

@section('content')
    @component('components.show')
        @slot('title', 'Visualizar Produto')
        @slot('editPath', route('product.edit', $produto->id))
        @slot('inputs')

        @endslot
    @endcomponent
@endsection
