<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            $andi = Pelanggan::create([
                'nama' => 'Andi Pratama',
                'alamat' => 'Jl. Melati No. 12',
                'email' => 'andi@example.com',
                'no_telepon' => '081234567890',
            ]);

            $budi = Pelanggan::create([
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Kenanga No. 5',
                'email' => 'budi@example.com',
                'no_telepon' => '082233445566',
            ]);

            $p1 = Produk::create([
                'nama' => 'Keyboard Mechanical',
                'harga' => 750000,
                'stok'  => 20,
                'deskripsi' => 'Switch brown, 87 keys',
            ]);

            $p2 = Produk::create([
                'nama' => 'Mouse Wireless',
                'harga' => 250000,
                'stok'  => 50,
                'deskripsi' => '2.4GHz + BT',
            ]);

            $pes1 = Pesanan::create([
                'tanggal_pesanan' => now()->toDateString(),
                'pelanggan_id'    => $andi->id,
                'total_harga'     => 0,
                'status'          => 'diproses',
            ]);

            $d1 = DetailPesanan::create([
                'pesanan_id'   => $pes1->id,
                'produk_id'    => $p1->id,
                'jumlah'       => 1,
                'harga_satuan' => $p1->harga,
                'subtotal'     => $p1->harga * 1,
            ]);

            $d2 = DetailPesanan::create([
                'pesanan_id'   => $pes1->id,
                'produk_id'    => $p2->id,
                'jumlah'       => 2,
                'harga_satuan' => $p2->harga,
                'subtotal'     => $p2->harga * 2,
            ]);

            // update total pesanan
            $pes1->update([
                'total_harga' => $d1->subtotal + $d2->subtotal,
                'status'      => 'selesai',
            ]);

            // buat 1 pesanan kosong untuk Budi
            Pesanan::create([
                'tanggal_pesanan' => now()->subDay()->toDateString(),
                'pelanggan_id'    => $budi->id,
                'total_harga'     => 0,
                'status'          => 'diproses',
            ]);
        });
    }
}
