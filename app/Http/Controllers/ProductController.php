<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


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
        return Product::find($id);
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
}
