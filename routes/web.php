<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

// Publicly Accessible Routes
Route::get('/', [ShopController::class, 'home'])->name('shop.home');
Route::get('/products', [ShopController::class, 'products'])->name('shop.products');
Route::get('/products/{product}', [ShopController::class, 'productDetail'])->name('shop.product.detail');
Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');

// User Authentication Routes (provided by Laravel's authentication system)
require __DIR__.'/auth.php';

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ShopController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ShopController::class, 'profile'])->name('profile');
});
