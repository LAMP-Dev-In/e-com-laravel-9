@extends('master')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <div class="tranding-wrapper">
            <h4>Cart Items</h4>
            <a class="btn btn-success" href="ordernow">Order Now</a><br><br>
            @foreach($cartitems as $cartitem)
            <div class="row seaeched-item cart-list-divider">
                <div class="col-sm-3">
                <a href="detail/{{$cartitem->id}}">
                    <img class="tranding-image" src="{{$cartitem->gallery}}">                        
                </a>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <h2>{{$cartitem->name}}</h2>
                        <h5>{{$cartitem->description}}</h5>
                        <h6>Price: ${{$cartitem->price}}</h6>
                    </div>                    
                </div>
                <div class="col-sm-3">
                    <a href="/removecart/{{$cartitem->cart_id}}" class="btn btn-warning">Remove from Cart</a>
                </div>
                </div>
            @endforeach
            <a class="btn btn-success" href="ordernow">Order Now</a>
        </div>
    </div>
</div>
@endsection