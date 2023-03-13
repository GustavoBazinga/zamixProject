@extends('layout.layout')

@section('content')
    @component('components.report')
        @slot('title', 'Relatório de Produtos')
        @slot('bodyItems')

        @endslot

    @endcomponent

    <script src="{{ asset('js/scripts.js')}}"></script>
@endsection
