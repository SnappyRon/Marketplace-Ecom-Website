<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerProductController;
use App\Http\Middleware\IsSeller;
use App\Http\Controllers\SellerSalesController;



// Include authentication routes from Laravel Breeze
require __DIR__.'/auth.php';

// Home page route (serves as the dashboard)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Shop routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{cartItemId}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{cartItemId}', [CartController::class, 'remove'])->name('cart.remove');

// **New Route Added Below: Show Checkout Form**
Route::get('/cart/checkout', [CartController::class, 'showCheckoutForm'])
    ->middleware('auth')
    ->name('cart.checkout.form');
// **End of New Route**


// Checkout route (requires user to be authenticated)
Route::post('/cart/checkout', [CartController::class, 'checkout'])
    ->middleware('auth')
    ->name('cart.checkout');

    
// Product details route
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');

// Contact page
Route::view('/contact', 'contact')->name('contact');

// Profile routes (authenticated users only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Seller-specific routes

// Route::prefix('seller')->group(function () {
//     Route::middleware(['auth', IsSeller::class])->group(function () {
//         Route::get('/', [SellerController::class, 'dashboard'])->name('seller.dashboard');
//         Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
//         Route::resource('/products', SellerProductController::class);
//     });

//     Route::get('/register', [SellerController::class, 'showRegistrationForm'])->name('seller.register');
//     Route::post('/register', [SellerController::class, 'register'])->name('seller.register.submit');
// });



Route::get('/test-middleware', function () {
    return 'Middleware test passed.';
})->middleware([IsSeller::class]);

Route::get('/debug-middleware', function () {
    return response()->json(app('router')->getMiddleware());
});





Route::prefix('seller')->middleware(['auth', IsSeller::class])->group(function () {
    Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
});

Route::prefix('seller')->middleware(['auth', \App\Http\Middleware\IsSeller::class])->group(function () {
    Route::resource('products', SellerProductController::class, [
        'as' => 'seller', // Adds 'seller.' prefix to route names
    ]);
});

Route::prefix('seller')->middleware(['auth', \App\Http\Middleware\IsSeller::class])->group(function () {
    Route::get('sales', [SellerSalesController::class, 'index'])->name('seller.sales');
});



Route::prefix('seller')->middleware(['auth', \App\Http\Middleware\IsSeller::class])->group(function () {
    // ... existing routes
    Route::get('sales/{order}', [SellerSalesController::class, 'show'])->name('seller.sales.show');
});

Route::prefix('seller')->middleware(['auth', \App\Http\Middleware\IsSeller::class])->group(function () {
    // ... existing routes
    Route::put('sales/{order}/status', [SellerSalesController::class, 'updateStatus'])->name('seller.sales.updateStatus');
});
