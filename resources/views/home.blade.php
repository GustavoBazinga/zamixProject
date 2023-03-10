@extends('layout.layout')

@section('content')
    <!-- Página home com painel para cada CRUD -->
    <div class="containerHome">
        <div class="row">
            <div class="col-md-6 text-center">
                <!-- Cada card redireciona para a página de cada CRUD -->

                <!-- CRUD de produto -->
                <a href=" {{route('product.index')}}">
                    <div class="cardHome">
                        <img src="{{asset('images/iconProduct.png')}}" alt="" style="width: 150px">
                    </div>
                </a>

                <!-- CRUD de funcionário -->
                <a href="{{route('worker.index')}}">
                    <div class="cardHome">
                        <img src="{{asset('images/iconWorkers.png')}}" alt="" style="width: 150px">
                    </div>
                </a>
            </div>
            <div class="col-md-6 text-center">

                <!-- CRUD de lotes -->
                <a href="{{ route('batch.index') }}">
                    <div class="cardHome">
                        <img src="{{asset('images/iconStock.png')}}" alt="" style="width: 150px">
                    </div>
                </a>

                <!-- CRUD de requisições -->
                <a href="">
                    <div class="cardHome">
                        <img src="{{asset('images/iconRequest.png')}}" alt="" style="width: 150px">
                    </div>
                </a>
            </div>
        </div>

    </div>

@endsection
