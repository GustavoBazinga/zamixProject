@extends('layout.layout')

@section('content')
    <div class="containerHome">
        <div class="row">
            <div class="col-md-6 text-center">
                <a href=" {{route('product.index')}}">
                    <div class="cardHome">
                        <img src="{{asset('images/iconProduct.png')}}" alt="" style="width: 150px">
                    </div>
                </a>
                <a href="">
                    <div class="cardHome">
                        <img src="{{asset('images/iconWorkers.png')}}" alt="" style="width: 150px">
                    </div>
                </a>
            </div>
            <div class="col-md-6 text-center">
                <a href="">
                    <div class="cardHome">
                        <img src="{{asset('images/iconStock.png')}}" alt="" style="width: 150px">
                    </div>
                </a>
                <a href="">
                    <div class="cardHome">
                        <img src="{{asset('images/iconRequest.png')}}" alt="" style="width: 150px">
                    </div>
                </a>
            </div>
        </div>

    </div>

@endsection
