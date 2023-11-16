<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class,'index'])
->name('product.index');
Route::get('/product/create', [ProductController::class,"create"])
->name("product.create");
Route::post('/product/create', [ProductController::class,"store"])
->name("product.store");
//cart
Route::get('/list_cart', [CartController::class,'index'])
->name('cart.index');
Route::get('/add_cart/{id}', [CartController::class,'addToCart'])
->name('cart.add_item');
Route::get('/delete_item_cart/{id}', [CartController::class,'deleteItemCart'])
->name('cart.delete_item');
Route::get('/cart/increase/{id}', [CartController::class,'increaseQuatity'])
->name('cart.increase');
Route::get('/cart/decrease/{id}', [CartController::class,'decreaseQuatity'])
->name('cart.decrease');

//order
Route::get('/order', [OrderController::class,'index'])
->name('order.index');
Route::get('/order/store', [OrderController::class,'store'])
->name('order.store');
Route::get('/order/detail/{id}', [OrderController::class,'detail'])
->name('order.detail');
