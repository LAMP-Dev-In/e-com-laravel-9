<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart(Request $request)
    {
        if($request->session()->has('user')){

            Cart::create([
                'user_id'       => session('user')->id,
                'product_id'    => $request->product_id,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);

            return redirect('/');
        } else{
            return redirect('/login');
        }
    }

    static function cartItemCount()
    {        
        $cart_count = (session('user'))
        ? Cart::where('user_id', session('user')->id)->count() : 0 ;
        
        return $cart_count;
    }

    function cartList()
    {
        if(!session('user')) return;

        $cartitems = DB::table('cart')
                    ->join('products', 'cart.product_id', '=', 'products.id')
                    ->where('cart.user_id', session('user')->id)
                    ->select('products.*', 'cart.id as cart_id')
                    ->get();

        return view('cartlist')->with('cartitems', $cartitems);
    }

    function removeCartItem($id)
    {
        Cart::destroy($id);

        return redirect('cartlist');
    }

}
       