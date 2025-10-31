<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DetailPesananController;

Route::get('/', fn() => redirect()->route('pelanggan.index'));

Route::resource('pelanggan', PelangganController::class)->only(['index','show']);
Route::resource('produk', ProdukController::class)->only(['index','show']);
Route::resource('pesanan', PesananController::class)->only(['index','show']);
Route::resource('detail-pesanan', DetailPesananController::class)->only(['index','show'])
     ->parameters(['detail-pesanan' => 'detail_pesanan']);
