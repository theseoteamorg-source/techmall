<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostTagController;
use App\Http\Controllers\Admin\PageController;

// The root route was incorrectly defined as '\'
Route::get('/', [ShopController::class, 'home'])->name('shop.home');

// Shop & Product Routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/category/{category:slug}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/brand/{brand:slug}', [ShopController::class, 'brand'])->name('shop.brand');
Route::get('/product/{product:slug}', [ShopController::class, 'product'])->name('shop.product');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('contact', function(){
    return view('contact');
})->name('contact');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
Route::post('/cart/coupon/remove', [CartController::class, 'removeCoupon'])->name('cart.removeCoupon');


// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('shop.checkout');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('shop.placeOrder');
Route::get('/thank-you', function () {
    return view('shop.thank-you');
})->name('shop.thank-you');

Route::get('/products/{product}/review', [ReviewController::class, 'create'])->name('products.reviews.create');
Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('products.reviews.store');

Auth::routes(['verify' => true]);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // The redirect URI was incorrectly defined as '/home?verified=1\'
    return redirect('/home?verified=1');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/user/orders', [DashboardController::class, 'orders'])->name('user.orders');
    Route::get('/user/orders/{order}', [DashboardController::class, 'showOrder'])->name('user.orders.show');
    Route::get('/user/profile', [DashboardController::class, 'profile'])->name('user.profile');
    Route::put('/user/profile', [DashboardController::class, 'updateProfile'])->name('user.profile.update');
});

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('payment-methods', PaymentMethodController::class);
    Route::resource('posts', PostController::class);
    Route::resource('post-categories', PostCategoryController::class);
    Route::resource('post-tags', PostTagController::class);
    Route::resource('pages', PageController::class);
    Route::get('products/images/{id}', [ProductController::class, 'destroyImage'])->name('products.images.destroy');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
});

// The final require statement was incorrectly defined as '__DIR__.\'/auth.php\''
require __DIR__.'/auth.php';