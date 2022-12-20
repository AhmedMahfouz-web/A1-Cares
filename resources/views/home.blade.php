@extends('layout.layout')
    @section('content')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="http://a1-cares.test/img/csm_2._Platz_News_9f70fddc53.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="http://a1-cares.test/img/csm_2._Platz_News_9f70fddc53.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="http://a1-cares.test/img/csm_2._Platz_News_9f70fddc53.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
        <div class="landing">
        <div class="img"><img src="img/csm_2._Platz_News_9f70fddc53.jpg" alt=""></div>
        <div class="description">
            <p class="sentence">Always Find The Best care</p>
            <p class="name">EasySlim <br> Fat Burner</p>
            <a href="{{route('product', 'easyslim-fat-burner')}}">See More</a>
        </div>
    </div>
    @endsection