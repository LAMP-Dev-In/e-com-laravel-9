@extends('master')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <div class="tranding-wrapper">
            <h4>Cart Items</h4>
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
                    </div>                    
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-warning">Remove from Cart</button>
                </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection