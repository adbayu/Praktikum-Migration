<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();                               // integer PK
            $table->string('nama');                     // NN
            $table->text('alamat')->nullable();         // boleh null (tidak ada NN pada gambar)
            $table->string('email')->nullable();        // boleh null
            $table->string('no_telepon')->nullable();   // boleh null
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};