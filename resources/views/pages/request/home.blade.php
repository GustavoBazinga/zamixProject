@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-6">
            <a href=" {{route('request.index_request')}}">
                <div class="cardHome">
                    <img src="{{asset('images/iconRequestSubMenu.png')}}" alt="" style="width: 150px">
                </div>
            </a>
        </div><div class="col-6">
            <a href=" {{route('product.index')}}">
                <div class="cardHome">
                    <img src="{{asset('images/iconReport.png')}}" alt="" style="width: 150px">
                </div>
            </a>
        </div>

    </div>

@endsection
