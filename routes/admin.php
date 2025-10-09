<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostTagController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('products', ProductController::class);
    Route::put('products/{product}/variants', [ProductController::class, 'updateVariants'])->name('products.variants.update');
    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('posts', PostController::class);
    Route::resource('post-categories', PostCategoryController::class);
    Route::resource('post-tags', PostTagController::class);
    Route::get('reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('reports/customers', [ReportController::class, 'customers'])->name('reports.customers');
    Route::get('reports/low-stock', [ReportController::class, 'lowStock'])->name('reports.low-stock');
    Route::resource('pages', PageController::class);
    Route::get('media', [MediaController::class, 'index'])->name('media.index');
    Route::resource('staff', StaffController::class);
    Route::resource('settings', SettingController::class)->only(['index', 'store']);
});
