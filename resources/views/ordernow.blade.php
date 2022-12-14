@extends('master')
@section("content")
<div class="custom-product">
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
    </div>
</div>
@endsection