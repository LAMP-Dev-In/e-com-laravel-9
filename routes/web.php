<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::post('login', [UserController::class, 'login']);
Route::get('/', [ProductController::class, 'index']);
Route::get('detail/{id}', [ProductController::class, 'detail']);
Route::post('add_to_cart', [CartController::class, 'addToCart']);
Route::get('cartlist', [CartController::class, 'cartList']); 
Route::get('removecart/{id}', [CartController::class, 'removeCartItem']);
Route::get('ordernow', [OrderController::class, 'orderNow']);
Route::post('placeorder', [OrderController::class, 'placeOrder']);
Route::post('buynow', [OrderController::class, 'buyNow']);
Route::get('myorders', [OrderController::class, 'myOrders']);


