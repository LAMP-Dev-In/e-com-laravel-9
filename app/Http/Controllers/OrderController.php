<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
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
        if(!empty($request->input('buynow_productid')))
        {
            $buynow_product = Product::find($request->input('buynow_productid'));

             Order::create([
                'product_id'     => $buynow_product->id,
                'user_id'        => session('user')->id,
                'status'         => 'pending',
                'payment_method' => $request->payment,
                'payment_status' => 'pending',
                'address'        => $request->address,
                'created_at'     => now(),
                'updated_at'     => now()
            ]); 

            //remove from my cart for buy now
            Cart::where('user_id', session('user')->id)
                  ->where('product_id', $buynow_product->id)
                  ->delete();

        }
        else
        {
            $mycart =  Cart::where('user_id', session('user')->id)->get();

            //make my cart items to order
            foreach ($mycart as $orderitem) {
                Order::create([
                    'product_id'     => $orderitem->product_id,
                    'user_id'        => $orderitem->user_id,
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
        }
        
        return redirect('/');
    }


    function buyNow(Request $request, CartController $cart)
    {
        if($request->session()->has('user'))
        {
            $cart->addToCart($request);

            $product_id = $request->input('product_id');
            
            $amount = Product::find($product_id)->price;

            return view('ordernow')
            ->with('total_amount', $amount)
            ->with('buynow_productid', $product_id);
        }
        else return redirect('/login');
        
    }

}
