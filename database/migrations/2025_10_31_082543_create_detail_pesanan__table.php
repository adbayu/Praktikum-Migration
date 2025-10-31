<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();                                                // integer PK
            $table->foreignId('pesanan_id')                              // NN
                ->constrained('pesanan')
                ->cascadeOnUpdate()
                  ->cascadeOnDelete();                                   // satu pesanan banyak detail
            $table->foreignId('produk_id')                               // NN
                ->constrained('produk')
                ->cascadeOnUpdate()
                  ->restrictOnDelete();                                  // produk tak bisa dihapus jika dipakai (opsi aman)
            $table->unsignedInteger('jumlah');                           // NN
            $table->decimal('harga_satuan', 12, 2);                      // NN (snapshot harga saat beli)
            $table->decimal('subtotal', 14, 2)->nullable();              // opsional: jumlah * harga_satuan
            $table->timestamps();

            // (Opsional) indeks komposit untuk pencarian cepat
            $table->unique(['pesanan_id', 'produk_id'], 'uniq_pesanan_produk');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan');
    }
};
