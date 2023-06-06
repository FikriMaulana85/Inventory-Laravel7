<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'LoginController@index')->name('login');
Route::post('/login/auth', 'LoginController@auth')->name('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/barang', 'BarangController@index');
    Route::get('/barang/add', 'BarangController@add');
    Route::post('/barang/store', 'BarangController@store');
    Route::get('/barang/edit/{id}', 'BarangController@edit');
    Route::put('/barang/edit/{id}', 'BarangController@update');
    Route::delete('/barang/delete/{id}', 'BarangController@destroy');

    Route::get('/supplier', 'SupplierController@index');
    Route::get('/supplier/add', 'SupplierController@add');
    Route::post('/supplier/store', 'SupplierController@store');
    Route::get('/supplier/edit/{id}', 'SupplierController@edit');
    Route::put('/supplier/edit/{id}', 'SupplierController@update');
    Route::delete('/supplier/delete/{id}', 'SupplierController@destroy');

    Route::get('/pembelian', 'PembelianController@index');
    Route::get('/pembelian/add', 'PembelianController@add');
    Route::post('/pembelian/store', 'PembelianController@store');
    Route::delete('/pembelian/delete/{id}', 'PembelianController@destroy');


    Route::get('/penjualan', 'PenjualanController@index');
    Route::get('/penjualan/kasir', 'PenjualanController@add');
    Route::post('/penjualan/add_cart', 'PenjualanController@add_cart');
    Route::delete('/penjualan/delete_cart/{id}', 'PenjualanController@delete_cart');
    Route::post('/penjualan/store', 'PenjualanController@store');
    Route::get('/penjualan/print/{id}', 'PenjualanController@print');
    // Route::delete('/penjualan/delete/{id}', 'PenjualanController@destroy');

    Route::get('/laporan/pembelian', 'LaporanController@pembelian');
    Route::post('/laporan/cetak_transaksi_pembelian', 'LaporanController@cetak_pembelian');
    Route::get('/laporan/penjualan', 'LaporanController@penjualan');
    Route::post('/laporan/cetak_transaksi_penjualan', 'LaporanController@cetak_penjualan');
});