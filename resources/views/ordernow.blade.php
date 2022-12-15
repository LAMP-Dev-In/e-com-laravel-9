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
        <form>
            <div class="mb-3">
                <textarea class="form-control" placeholder="Enter your address" name="address" cols="20" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Payment Method</label><br>
                <input type="radio" name="payment"><span> Online payment</span><br><br>
                <input type="radio" name="payment"><span> EMI payment</span><br><br>
                <input type="radio" name="payment"><span> Cash on Delivery(COD)</span><br><br>

            </div>
            
            <button type="submit" class="btn btn-primary">Make Payment</button>
        </form>
        </div>
    </div>
</div>
@endsection