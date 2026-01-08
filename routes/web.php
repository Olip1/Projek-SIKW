<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminBannerController;


Route::get('/about', [AboutController::class, 'index'])->name('about');

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// DETAIL PRODUK
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');

// KERANJANG
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::post('/keranjang/kurang/{id}', [KeranjangController::class, 'kurang'])->name('keranjang.kurang');
Route::put('/keranjang/update/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

// halaman checkout
Route::get('/checkout', [CheckoutController::class, 'index']) ->middleware('auth')->name('checkout');

// proses checkout
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('auth')->name('checkout.store');

// halaman kontak
Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');


// Route Khusus Admin
Route::middleware(['auth', 'is_admin'])
  ->prefix('admin')
  ->group(function () {

    Route::get('/dashboard', [AdminUserController::class, 'index'])
      ->name('admin.dashboard');

    Route::get('/users', [AdminUserController::class, 'show'])
      ->name('admin.user');

    Route::post('/users/{id}/disable', [AdminUserController::class, 'nonaktif'])
      ->name('admin.user.disable');

    Route::resource('products', AdminProductController::class)
      ->names('admin.products');

    Route::resource('banners', AdminBannerController::class)
    ->names('admin.banners');

    Route::get('/banner', [AdminUserController::class, 'banner'])
      ->name('admin.banners');

  });
