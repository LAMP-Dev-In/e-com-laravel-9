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
}
