<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();                                  // integer PK
            $table->string('nama');                        // NN
            $table->decimal('harga', 12, 2);               // NN
            $table->unsignedInteger('stok');               // NN
            $table->text('deskripsi')->nullable();         // boleh null
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
