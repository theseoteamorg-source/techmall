<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;

Route::get('/', [ShopController::class, 'home'])->name('shop.home');
Route::get('/products', [ShopController::class, 'products'])->name('shop.products');
Route::get('/products/{product}', [ShopController::class, 'productDetail'])->name('products.show');
Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
Route::get('/category/{category}', [ShopController::class, 'category'])->name('shop.category');
Route::get('contact', function(){
    return view('contact');
})->name('contact');

Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');

Auth::routes();

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('sliders', SliderController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
});
