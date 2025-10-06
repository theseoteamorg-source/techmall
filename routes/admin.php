<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RedirectController;
use App\Http\Controllers\Admin\CurrencyController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth', 'admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/brands', BrandController::class);
    Route::resource('/products', ProductController::class);
    Route::get('/products/images/{image}', [ProductController::class, 'destroyImage'])->name('products.images.destroy');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('/users', UserController::class);
    Route::resource('/orders', OrderController::class);
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::resource('/customers', CustomerController::class);
    Route::get('/redirect', [RedirectController::class, 'index'])->name('redirect.index');
    Route::resource('/currencies', CurrencyController::class);
});
