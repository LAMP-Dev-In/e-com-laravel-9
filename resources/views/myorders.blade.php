@extends('master')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <div class="tranding-wrapper">            
            @if($myorders->count()==0)
            <h4>Order is empty</h4>
            @else
            <h4>My Orders</h4>
            @foreach($myorders as $myorder)
            <div class="row seaeched-item cart-list-divider">
                <div class="col-sm-3">
                <a href="detail/{{$myorder->id}}">
                    <img class="tranding-image" src="{{$myorder->gallery}}">                        
                </a>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <h2>{{$myorder->name}}</h2>
                        <h6>Delivery Status: {{$myorder->status}}</h6>
                        <h6>Adderss: {{$myorder->address}}</h6>
                        <h6>Payment Status: {{$myorder->payment_status}}</h6>
                        <h6>Payment Method: {{$myorder->payment_method }}</h6>
                    </div>                    
                </div>
                </div>
            @endforeach
        </div>        
        @endif
    </div>
</div>
@endsection