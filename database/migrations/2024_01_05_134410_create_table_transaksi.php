<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->string('nama_produk');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('gambar');
            $table->string('harga');
            $table->string('bukti_transaksi')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transaksi');
    }
};
