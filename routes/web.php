<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
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

Route::get('/', [ShopController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('products', ProductController::class);
    Route::put('products/{product}/variants', [ProductController::class, 'updateVariants'])->name('products.variants.update');
});

Route::get('/product/{product:slug}', [ShopController::class, 'product'])->name('shop.product.show');
Route::get('pages/{slug}', [PageController::class, 'show'])->name('page.show');
Route::get('/thank-you', function () {
    return view('shop.thank-you');
})->name('shop.thank-you');

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/buy-now/{product}', [CartController::class, 'buyNow'])->name('cart.buy.now');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('deals', [DealController::class, 'index'])->name('shop.deals');
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('brand/{brand:slug}', [BrandController::class, 'show'])->name('brand.show');
