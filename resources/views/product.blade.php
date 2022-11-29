@extends('master')
@section("content")
<div class="custom-product">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        @foreach($products as $product)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$product->id - 1}}" aria-label="Slide {{$product->id}}" class="{{$product->id==1?'active':''}}" aria-current="{{$product->id==1?'true':''}}"></button>
        @endforeach
      </div>
      <div class="carousel-inner">
        @foreach($products as $product)
        <div class="carousel-item {{$product->id==1?'active':''}}">
          <img class="slider-img" src="{{$product->gallery}}" class="d-block w-100" alt="{{$product->name}}">
          <div class="carousel-caption d-none d-md-block slider-text">
            <h5>{{$product->name}}</h5>
            <p>{{$product->description}}</p>
          </div>
        </div>      
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="tranding-wrapper">
      <h3>Trending Products</h3>
      @foreach($products as $product)
        <div class="tranding-item">
          <img class="tranding-image" src="{{$product->gallery}}" class="d-block w-100" alt="{{$product->name}}">
          <div class="">
            <h5>{{$product->name}}</h5>
          </div>
        </div>      
        @endforeach
    </div>
</div>
@endsection