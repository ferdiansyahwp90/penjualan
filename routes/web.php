<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController as HomeController;
use App\Http\Controllers\Admin\BerasController as ProdukController; 
use App\Http\Controllers\Admin\PenjualanController as LaporanController;
use App\Http\Controllers\Admin\PembayaranController as TransaksiController;
use App\Http\Controllers\Pelanggan\KeranjangController as PelangganKeranjangController;
use App\Http\Controllers\Pelanggan\HomeController as PelangganHomeController;
use App\Http\Controllers\Pelanggan\PelangganController as PelangganController;
use App\Http\Controllers\Admin\PembayaranController as PelangganPembayaranController;

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


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/home', function () {
//     return view('admin.home.index');
// });

// Route::get('/user/home', function () {
//     return view('user.home.index');
// });

Route::get('/admin/home', function () {
    return view('admin.home.index');
});

Route::get('/', [PelangganHomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function(){ 
    Route::prefix('admin')->group(function(){
        Route::resource('home', HomeController::class);
        Route::resource('users', UserController::class);
        Route::resource('produk', ProdukController::class);
        Route::resource('transaksi', TransaksiController::class);
    });
});

Route::middleware('auth')->group(function(){
    Route::get('/user', [PelangganHomeController::class, 'index']);
    Route::get('/cart', [PelangganKeranjangController::class, 'index']);
    Route::get('/pembayaran', [PelangganPembayaranController::class, 'index']);
});

Route::get('/keluar', function(){
    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');
});

Route::get('/pelanggan', function(){
    return view([PelangganController::class, 'index']);
});