<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::withCount('detailPesanans')->orderBy('id')->get();
        return view('produk.index', compact('data'));
    }

    public function show(Produk $produk)
    {
        $produk->load('detailPesanans.pesanan');
        return view('produk.show', compact('produk'));
    }
}
