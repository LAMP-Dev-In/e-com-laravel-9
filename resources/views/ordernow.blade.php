@extends('master')
@section("content")
<div class="custom-product ordernow">
    <div class="col-sm-10">
        <table class="table">
        <tbody>
            <tr>
                <td>Amount</td>
                <td>${{$total_amount}}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>$ 0</td>
            </tr>
            <tr>
                <td >Delivery</td>
                <td>$10</td>
            </tr>
            <tr>
                <td >Total Amount</td>
                <td>${{$total_amount + 10}}</td>
            </tr>
        </tbody>
        </table>
        <div>
        <form action="placeorder" method="post">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" placeholder="Enter your address" name="address" cols="20" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Payment Method</label><br>
                <input type="radio" value="cash" name="payment"><span> Cash payment</span><br>
                <input type="radio" value="online" name="payment"><span> Online payment</span><br>
                <input type="radio" value="emi" name="payment"><span> EMI payment</span><br>
                <input type="radio" value="cod" name="payment"><span> Cash on Delivery(COD)</span><br>
            </div> 
            @if(!empty($buynow_productid))           
            <input type="hidden" name="buynow_productid" value="{{$buynow_productid}}">
            @endif
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
        </div>
    </div>
</div>
@endsection