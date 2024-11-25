<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::view('/', 'home');
Route::view('/shop', 'shop');
Route::view('/contact', 'contact');
Route::view('/seller', 'seller');

// Home page route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Shop routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{cartItemId}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{cartItemId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/product/{id}', action: [ProductController::class, 'show'])->name('product.details');



