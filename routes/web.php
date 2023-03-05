<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\paketController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::group(['middleware' => ['revalidate','auth']], function () {   
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboardAdmin', [dashboardController::class, 'index'])->name('dashboardAdmin');
        Route::resource('paket', paketController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::post('/ubahadmin/{id}', [TransaksiController::class, 'ubahadmin'])->name('ubahadmin');
        Route::get('/sudahadmin', [TransaksiController::class, 'sudahadmin'])->name('sudahadmin');
        Route::get('/laporanpdf', [TransaksiController::class, 'pdf']);
    });
Route::group(['middleware' => ['user']], function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    Route::post('/tambah/{id}', [TransaksiController::class, 'tambah'])->name('tambah');
    Route::delete('/hapus/{id}', [App\Http\Controllers\TransaksiController::class, 'delete'])->name('delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/keranjang/{id}', [App\Http\Controllers\TransaksiController::class, 'keranjang'])->name('keranjang');
    Route::get('/sudah/{id}', [App\Http\Controllers\TransaksiController::class, 'sudah'])->name('sudah');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
require __DIR__.'/auth.php';
