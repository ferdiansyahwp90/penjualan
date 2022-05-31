<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BerasController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengirimanController;
use Illuminate\Http\Request;

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

Route::resource('admin', AdminController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('keranjang', KeranjangController::class);
Route::resource('beras', BerasController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('penjualan', PenjualanController::class);
Route::resource('detailpenjualan', DetailPenjualanController::class);
Route::resource('pengiriman', PengirimanController::class);
