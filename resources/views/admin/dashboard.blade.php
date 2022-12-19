@extends('layout.admin-layout')

@section('content')
<div class="container col-xl-9 mt-5">
    <div class="row align-items-center">
@foreach ($products as $product)
        <div class="card m-3" style="width: 18rem;">
            <img src="{{asset('img/' . $product->photo)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->price}} $</p>
              <a href="{{route('edit', $product->slug)}}" class="btn btn-primary">Edit</a>
              <a href="#" class="btn btn-danger">Delete</a>
            </div>
        </div>
@endforeach

</div>
</div>
    
@endsection