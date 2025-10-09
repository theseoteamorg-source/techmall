<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::group(['as' => 'shop.'], function () {
    Route::get('/shop', [ShopController::class, 'index'])->name('index');
    Route::get('/product/{product:slug}', [ShopController::class, 'product'])->name('product.show');
    Route::get('/deals', [DealController::class, 'index'])->name('deals');
    Route::get('/thank-you', fn() => view('shop.thank-you'))->name('thank-you');
});

Route::group(['as' => 'cart.'], function () {
    Route::get('cart', [CartController::class, 'index'])->name('index');
    Route::get('cart/add/{product}', [CartController::class, 'add'])->name('add');
    Route::get('cart/buy-now/{product}', [CartController::class, 'buyNow'])->name('buy.now');
});

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::get('/pages/{slug}', [PageController::class, 'show'])->name('page.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/brand/{brand:slug}', [BrandController::class, 'show'])->name('brand.show');
