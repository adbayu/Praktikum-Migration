<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan::withCount('pesanans')->orderBy('id')->get();
        return view('pelanggan.index', compact('data'));
    }

    public function show(Pelanggan $pelanggan)
    {
        $pelanggan->load('pesanans');
        return view('pelanggan.show', compact('pelanggan'));
    }
}
