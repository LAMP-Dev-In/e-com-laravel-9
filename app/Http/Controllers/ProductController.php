<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            
            $product = [
                    'name'          => $request->name,
                    'price'         => $request->price,
                    'category'      => $request->category,
                    'description'   => $request->description,
                    'gallery'       => $request->gallery,
                    'created_at'    => now(),
                    'updated_at'    => now()
                    ];

            Product::create($product);

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
