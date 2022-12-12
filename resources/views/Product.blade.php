@extends('layout/layout')

@section('css')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@endsection

@section('content')
@foreach ($product as $product)
    
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{asset('img/' . $product->photo)}}" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1"></div>
                <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                <div class="fs-5 mb-5">
                    <span>{{$product->price}} L.E</span>
                </div>
                <p class="lead">{{$product->description}}</p>
            </div>
        </div>
    </div>
</section>

@endforeach
@endsection