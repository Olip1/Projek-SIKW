<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminEducationalVideoController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EducationController;

Route::get('/about', [AboutController::class, 'index'])->name('about');

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// DETAIL PRODUK
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');

Route::middleware('auth')->group(function () {

  // KERANJANG
  Route::get('/keranjang', [KeranjangController::class, 'index'])
    ->name('keranjang.index');

  Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])
    ->name('keranjang.tambah');

  Route::post('/keranjang/{id}/tambah', [KeranjangController::class, 'tambahQty'])->name('keranjang.tambahqty');
  Route::post('/keranjang/{id}/kurang', [KeranjangController::class, 'kurangQty'])->name('keranjang.kurangqty');


  Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])
    ->name('keranjang.hapus');

  // CHECKOUT
  Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

  Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

});
// proses checkout

// halaman kontak
Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

// Konten Video
Route::get('/edukasi', [EducationController::class, 'index'])->name('edukasi');

// Artikel
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.detail');


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
      ->names('admin.banner');

    Route::resource('orders', AdminOrderController::class)
      ->names('admin.orders');

  Route::put('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
    ->name('admin.orders.updateStatus');

    Route::resource('admin/edukasi', AdminEducationalVideoController::class)
      ->names('admin.edukasi');

  Route::resource('admin/artikel', AdminArticleController::class)
    ->names('admin.artikel');
  });
