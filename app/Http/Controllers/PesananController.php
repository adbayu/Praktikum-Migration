<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;

class PesananController extends Controller
{
    public function index()
    {
        $data = Pesanan::with(['pelanggan','detailPesanans.produk'])
            ->orderByDesc('tanggal_pesanan')->get();
        return view('pesanan.index', compact('data'));
    }

    public function show(Pesanan $pesanan)
    {
        $pesanan->load(['pelanggan','detailPesanans.produk']);
        return view('pesanan.show', compact('pesanan'));
    }
}
