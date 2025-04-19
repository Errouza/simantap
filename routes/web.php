<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    $products = \App\Models\Product::latest()->with('categories')->paginate(9);
    return view('welcome', compact('products'));
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', ProductController::class)->names('admin.products');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::post('/admin/orders/{order}/complete', [AdminController::class, 'completeOrder'])->name('admin.orders.complete');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/products/{product}', [UserController::class, 'show'])->name('user.products.show');
    Route::prefix('cart')->group(function () {
        Route::post('/add', [UserController::class, 'addToCart'])->name('cart.add');
        Route::get('/', [UserController::class, 'cart'])->name('cart.view');
        Route::post('/update', [UserController::class, 'updateCart'])->name('cart.update');
        Route::delete('/remove/{key}', [UserController::class, 'removeFromCart'])->name('cart.remove');
    });
    Route::post('/checkout/submit', [UserController::class, 'submitCheckout'])->name('checkout.submit');
    Route::get('/order/summary', [UserController::class, 'orderSummary'])->name('order.summary');
});
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::view('/home', 'layouts.home')->name('home');

// Route untuk halaman artikel
use App\Models\Artikel;
Route::get('/artikel', function () {
    $artikels = Artikel::orderBy('created_at', 'desc')->get();
    return view('layouts.artikel', compact('artikels'));
})->name('artikel');

// Route untuk halaman mualaf
use App\Http\Controllers\MualafController;
Route::get('/mualaf', [MualafController::class, 'create'])->name('mualaf');
Route::post('/mualaf', [MualafController::class, 'store'])->name('mualaf.store');

use App\Http\Controllers\InformasiController;
Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi');

use App\Http\Controllers\ReservasiController;
Route::get('/reservasi', [ReservasiController::class, 'create'])->name('reservasi');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

use App\Http\Controllers\ZakatController;
Route::get('/zakat', [ZakatController::class, 'index'])->name('zakat');

// Route untuk halaman admin panel
Route::view('/admin', 'layouts.admin.admin')->name('admin');

use App\Http\Controllers\AdminArtikelController;
use App\Http\Controllers\AdminBeritaController;
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('artikel', AdminArtikelController::class);
    Route::resource('berita', AdminBeritaController::class);
});

use App\Models\Berita;
Route::get('/berita', function () {
    $beritas = Berita::orderBy('created_at', 'desc')->get();
    return view('layouts.berita', compact('beritas'));
})->name('berita');

use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\GaleriController;
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::post('/donasi', [DonasiController::class, 'store'])->name('donasi.store');

Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');

require __DIR__.'/auth.php';
