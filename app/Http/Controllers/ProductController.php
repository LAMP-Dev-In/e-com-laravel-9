<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function index()
    {
        $data = Product::all();

        return view('product')->with('products', $data);
    }

    function detail(int $id)
    {
        $data =  Product::find($id);

        return view('detail')->with('product', $data);
    }

    function store(Request $request)
    {
        try {

            //code...
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category = $request->category;
            $product->description = $request->description;
            $product->gallery = $request->gallery;
            $product->created_at = now();
            $product->updated_at = now();
            $product->save();

            return response()->json([
                'message' => 'product created successfully',
                'data' => $product,
                'status' => 200

            ]);

        } catch (\Throwable $th) {

            //throw $th;
            return response()->json([
                'message' => 'product not created',
                'data' => $product,
                'status' => 201,
                'err' => $th
            ]);
        }



    }

    function addToCart(Request $request)
    {
        if($request->session()->has('user')){
            $cart = new Cart();
            $cart->user_id = $request->session()->get('user')->id;
            $cart->product_id = $request->product_id;
            $cart->save();

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


}
