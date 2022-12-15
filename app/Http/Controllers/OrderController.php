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

        //make my cart items to order
        foreach ($mycart as $cartitem) {
            Order::create([
                'product_id'     => $cartitem->product_id,
                'user_id'        => $cartitem->user_id,
                'status'         => 'pending',
                'payment_method' => $request->payment,
                'payment_status' => 'pending',
                'address'        => $request->address,
                'created_at'     => now(),
                'updated_at'     => now()
            ]);
        }

        //empty my cart
        Cart::where('user_id', session('user')->id)->delete();

        return redirect('/');
    }
}
