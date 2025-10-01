<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailController;

// Publicly Accessible Routes
Route::get('/', [ShopController::class, 'home'])->name('shop.home');
Route::get('/products', [ShopController::class, 'products'])->name('shop.products');
Route::get('/products/{product}', [ShopController::class, 'productDetail'])->name('shop.product.detail');
Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [MailController::class, 'send'])->name('contact.send');

// User Authentication Routes (provided by Laravel's authentication system)
require __DIR__.'/auth.php';

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ShopController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ShopController::class, 'profile'])->name('profile');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');
});
