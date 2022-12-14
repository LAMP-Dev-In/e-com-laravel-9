@extends('master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$product->gallery}}" alt="">
        </div>
        <div class="col-sm-6">
            <h2>{{$product->name}}</h2>
            <h3>Price : ${{$product->price}}</h3>
            <h4>Detail : {{$product->description}}</h4>
            <h4>category : {{$product->category}} </h4>
            <br><br>
            <form name="frmAddToCart" action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button class="btn btn-primary">Add to Cart</button>
            </form>
            <br><br>
            <form name="frmBuyNow" action="/buynow" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button class="btn btn-success">Buy Now</button>
            </form>
            <br><br>
            <a href="/">Go Back</a>
        </div>
    </div>

</div>
@endsection