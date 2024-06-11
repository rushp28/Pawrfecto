<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(callback: function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'redirect'])->name('redirect');

    Route::middleware(['role:super admin'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('product-categories', ProductCategoryController::class);
        Route::resource('products', ProductController::class);
    });

    Route::middleware(['role:admin'])->group(function () {
        // Routes for admin
    });

    Route::middleware(['role:vendor'])->group(function () {
        Route::resource('vendors', VendorController::class);
        Route::resource('shops', ShopController::class);
        Route::resource('products', ProductController::class);
    });

    Route::middleware(['role:custom vendor role'])->group(function () {

    });

    Route::middleware(['role:customer'])->group(function () {
        Route::resource('customers', CustomerController::class);
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::resource('carts', CartController::class);
        Route::post('carts/add/{productId}', [CartController::class, 'addToCart'])->name('carts.add');
        Route::post('carts/remove/{productId}', [CartController::class, 'removeFromCart'])->name('carts.remove');
        Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
        Route::post('checkout', [CartController::class, 'processCheckout'])->name('process-checkout');
        Route::post('pay', [PaymentController::class, 'pay'])->name('payment');
        Route::get('payment/success', [PaymentController::class, 'handleSuccess'])->name('payment.success');
        Route::get('payment/cancel', [PaymentController::class, 'handleCancel'])->name('payment.cancel');
    });
});
//dashboard?paymentId=PAYID-MZUNLGI9PL18678BA038060T&token=EC-0N532393PE8161736&PayerID=4LBP859CLXRJL

Route::get('/vendor-register', [App\Http\Controllers\HomeController::class, 'redirectToVendorRegister'])->name('vendor-register');
