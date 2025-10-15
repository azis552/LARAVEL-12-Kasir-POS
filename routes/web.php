<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RoleMenusController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login_check'])->name('login_check');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('users/index', [userController::class, 'index'])->name('users.index');
    Route::get('users', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::resource('menus', MenusController::class);
    Route::resource('role_menus', RoleMenusController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::get('transaksi/pos', [TransaksiController::class, 'pos'])->name('transaksi.pos');
    Route::resource('transaksi', TransaksiController::class);
    

    Route::post('kategori', [ProdukController::class, 'tambahKategori'])->name('produk.tambah_kategori');
    Route::resource('produk', ProdukController::class);
    Route::resource('laporan', LaporanController::class);
    Route::get('laporan/transaksi', [LaporanController::class, 'transaksi'])->name('laporan.transaksi');
    Route::get('laporan/produk', [LaporanController::class, 'produk'])->name('laporan.produk');
});


