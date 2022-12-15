<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function orderNow()
    {
       $total_amount = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', session('user')->id)
        ->sum('products.price');

        return view('ordernow')->with('total_amount', $total_amount);
    }

    function placeOrder(Request $request)
    {
        $mycart =  Cart::where('user_id', session('user')->id)->get();
        foreach ($mycart as $cartitem) {
            $order = new Order();
            $order->product_id = $cartitem->product_id;
            $order->user_id = $cartitem->user_id;
            $order->status = 'pending';
            $order->payment_method = $request->payment;
            $order->payment_status = 'pending';
            $order->address = $request->address;
            $order->created_at = now();
            $order->updated_at = now();
            $order->save();
        }

        Cart::where('user_id', session('user')->id)->delete();

        return redirect('/');
    }
}
