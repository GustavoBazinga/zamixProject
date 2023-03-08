@extends('layout.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center pt-4">
                {{-- Create a img tag with a iomage with a radius border maxium          --}}
                <img src="{{ asset('images/logoZamix.png') }}" alt="Your image" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center pt-4">
                <div class="card">
                    <img src="{{asset('images/iconProduct.png')}}" alt="" style="width: 150px">
                </div>
                <div class="card">
                    <img src="{{asset('images/iconWorkers.png')}}" alt="" style="width: 150px">
                </div>
            </div>
            <div class="col-md-6 text-center pt-4">
                <div class="card">
                    <img src="{{asset('images/iconStock.png')}}" alt="" style="width: 150px">
                </div>
                <div class="card">
                    <img src="{{asset('images/iconRequest.png')}}" alt="" style="width: 150px">
                </div>
            </div>
        </div>
    </div>

@endsection
