<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;

// Publicly Accessible Routes
Route::get('/', [ShopController::class, 'home'])->name('shop.home');
Route::get('/products', [ShopController::class, 'products'])->name('shop.products');
Route::get('/products/{product}', [ShopController::class, 'productDetail'])->name('shop.product.detail');
Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
Route::get('/thank-you', [ShopController::class, 'thankYou'])->name('shop.thank-you');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [MailController::class, 'send'])->name('contact.send');

// User Authentication Routes
require __DIR__.'/auth.php';

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ShopController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('customers', App\Http\Controllers\Admin\CustomerController::class);
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');
});
