<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();                                           // integer PK
            $table->date('tanggal_pesanan');                        // NN
            $table->foreignId('pelanggan_id')                       // NN
                ->constrained('pelanggan')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->decimal('total_harga', 14, 2)->nullable();      // bisa dihitung agregat; opsional
            $table->enum('status', ['diproses','selesai']);         // NN, sesuai permintaan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
