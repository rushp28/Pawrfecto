<?php

use App\Http\Controllers\CustomerController;
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
        // Routes for super admin
    });

    Route::middleware(['role:admin'])->group(function () {
        // Routes for admin
    });

    Route::middleware(['role:vendor'])->group(function () {
        Route::resource('vendors', VendorController::class);
    });

    Route::middleware(['role:custom vendor role'])->group(function () {

    });

    Route::middleware(['role:customer'])->group(function () {
        Route::resource('customers', CustomerController::class);
    });
});

Route::get('/vendor-register', [App\Http\Controllers\HomeController::class, 'redirectToVendorRegister'])->name('vendor-register');
