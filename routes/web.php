<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatalogController;

// Halaman Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
});

// Halaman yang wajib login
Route::middleware('auth')->group(function () {

    // Halaman utama
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Produk
    Route::get('/produk', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/produk/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/produk', [ProductController::class, 'store'])
        ->name('products.store');

    // Kasir
    Route::get('/kasir', [SaleController::class, 'create'])
        ->name('sales.create');

    Route::post('/kasir', [SaleController::class, 'store'])
        ->name('sales.store');

    // Riwayat Transaksi
    Route::get('/riwayat', [SaleController::class, 'index'])
        ->name('sales.index');

    Route::get('/transaksi', [SaleController::class, 'index'])
        ->name('transactions.index');

    Route::post('/transaksi', [SaleController::class, 'store'])
        ->name('transactions.store');

    // Detail Transaksi
    Route::get('/transaksi/{sale}', [SaleController::class, 'show'])
        ->name('sales.show');

    // Katalog Sepatu
    Route::get('/katalog', [CatalogController::class, 'index'])
        ->name('catalog.index');
    
    Route::get('/katalog/{id}', [CatalogController::class, 'show'])
        ->name('catalog.show');
});