<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TraceabilityBatchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TraceabilityController;
use Illuminate\Support\Facades\Route;

// Language Switcher
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// 1. Beranda (Home Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Tentang Kami (About)
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('tentang');

// 3. Produk (Our Product)
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// 4. Proses & Inovasi
Route::get('/proses-inovasi', [ProcessController::class, 'index'])->name('proses');

// 5. Traceability (Ketertelusuran Produk)
Route::get('/traceability', [TraceabilityController::class, 'index'])->name('traceability');
Route::post('/api/traceability/check', [TraceabilityController::class, 'checkApi'])->name('traceability.api');

// 6. Edukasi
Route::get('/edukasi', [EducationController::class, 'index'])->name('edukasi');

// 7. Berita / Artikel
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.show');

// 8. Kontak
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

// 9. Transaksi & Keranjang Belanja Langsung (In-App Transactions)
Route::prefix('keranjang')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/tambah', [CartController::class, 'add'])->name('add');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::post('/hapus', [CartController::class, 'remove'])->name('remove');
    Route::post('/kosongkan', [CartController::class, 'clear'])->name('clear');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/pesanan/{orderNumber}', [CheckoutController::class, 'success'])->name('order.success');
Route::get('/lacak-pesanan', [CheckoutController::class, 'track'])->name('order.track');

// 10. Portal & Panel Manajemen Konten Admin (CMS)
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Products Management
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class)->except(['show']);

        // Articles & News Management
        Route::resource('articles', ArticleController::class)->except(['show']);

        // Traceability Batches Management
        Route::resource('traceability', TraceabilityBatchController::class)->except(['show']);

        // Orders Management
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');

        // Contact Messages Management
        Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
    });
});
