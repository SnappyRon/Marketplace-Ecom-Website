<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// Include authentication routes from Laravel Breeze
require __DIR__.'/auth.php';

// Home page route (serves as the dashboard)
Route::get('/', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

// Shop routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{cartItemId}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{cartItemId}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout route (requires user to be authenticated)
Route::post('/cart/checkout', [CartController::class, 'checkout'])
    ->middleware('auth')
    ->name('cart.checkout');

// Product details route
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');

// Contact page
Route::view('/contact', 'contact')->name('contact');

// Seller page
Route::view('/seller', 'seller')->name('seller');

// Profile routes (authenticated users only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


