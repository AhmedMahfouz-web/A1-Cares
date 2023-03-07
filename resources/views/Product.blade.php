@extends('layout/layout')

@section('css')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
<style>
.carousel-indicators{
  top: 100%;
}

.carousel-indicators  [data-bs-target]{
    width: 200px;
    height: 75px
}

.carousel-indicators button img {
    display: block;
    opacity: 0.5;
    width: 100%;
    max-height: 100%;
 }

.carousel-indicators button.active img {
    opacity: 1;
  }

.carousel-indicators button:hover img {
    opacity: 0.75;
  }

</style>
@endsection

@section('content')
@foreach ($product as $product)
    
<section class="py-5">
    <div class="container px-4 px-lg-5 mb-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6 align-self-start"><div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                    <img src="{{asset("img/" . $product->photo)}}" alt="">
                  </button>
                  @foreach ($product->image as $key => $image)
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key + 1}}" aria-label="Slide 2">
                    <img src="{{asset("img/" . $image->photo)}}" alt="">
                  </button>
                  @endforeach
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{asset("img/" . $product->photo)}}" class="d-block w-100" alt="...">
                  </div>
                  @foreach ($product->image as $image)
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset("img/" . $image->photo)}}" class="d-block w-100" alt="...">
                  </div>                      
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <div class="col-md-6 product-details ">
                <div class="small mb-1"></div>
                <h2 class="display-6 fw-bolder">{{$product->name}}</h2>
                <div class="fs-5 mb-5">
                    <span class="orange">{{$product->price}} $</span>
                </div>
                <h5 class="orange-h4">Description :</h5>
                <p class="lead">{!!$product->description!!}</p>
            </div>
        </div>
    </div>
</section>

@endforeach
@endsection

@section('js')
    
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

@endsection