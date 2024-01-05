<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard-admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori', 'index')->name('kategori');
        Route::post('/kategori/save', 'store')->name('kategori.save');
        Route::get('/kategori/edit/{id}', 'edit')->name('kategori.edit');
        Route::post('/kategori/update/{id}', 'update')->name('kategori.update');
        Route::get('/kategori/delete/{id}', 'destroy')->name('kategori.delete');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/produk', 'index')->name('produk');
        Route::post('/produk/save', 'store')->name('produk.save');
        Route::get('/produk/edit/{id}', 'edit')->name('produk.edit');
        Route::post('/produk/update/{id}', 'update')->name('produk.update');
        Route::get('/produk/delete/{id}', 'destroy')->name('produk.delete');
    });
});

Route::middleware(['auth', 'role:supplier|admin'])->group(function () {
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/supplier', 'index')->name('supplier');
    });
});
Route::middleware(['auth', 'role:supplier'])->group(function () {
    Route::controller(SupplierController::class)->group(function () {
        Route::post('/supplier/save', 'store')->name('supplier.save');
        Route::get('/supplier/edit/{id}', 'edit')->name('supplier.edit');
        Route::post('/supplier/update/{id}', 'update')->name('supplier.update');
        Route::get('/supplier/delete/{id}', 'destroy')->name('supplier.delete');
    });
});
require __DIR__ . '/auth.php';
