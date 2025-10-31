<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;

class DetailPesananController extends Controller
{
    public function index()
    {
        $data = DetailPesanan::with(['pesanan.pelanggan','produk'])
            ->orderBy('pesanan_id')->orderBy('id')->get();
        return view('detail_pesanan.index', compact('data'));
    }

    public function show(DetailPesanan $detail_pesanan)
    {
        $detail_pesanan->load(['pesanan.pelanggan','produk']);
        return view('detail_pesanan.show', ['d' => $detail_pesanan]);
    }
}
