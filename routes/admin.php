<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostTagController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\PermissionController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('posts', PostController::class);
    Route::resource('post-categories', PostCategoryController::class);
    Route::resource('post-tags', PostTagController::class);
    Route::resource('pages', PageController::class);
    Route::resource('media', MediaController::class);
    Route::resource('deals', DealController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('permissions', PermissionController::class);
});
