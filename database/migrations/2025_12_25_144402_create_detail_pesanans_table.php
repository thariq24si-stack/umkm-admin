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
    // Hapus tabel lama jika ada sisa error sebelumnya
    Schema::dropIfExists('detail_pesanan');

    Schema::create('detail_pesanan', function (Blueprint $table) {
        $table->id('detail_id'); 
        
        // Sesuaikan dengan tabel pesanan (BigInteger)
        $table->unsignedBigInteger('pesanan_id'); 
        
        // SESUAIKAN DENGAN TABEL UMKM (Integer) agar tidak error errno: 150
        $table->unsignedInteger('produk_id'); 
        
        $table->integer('qty');
        $table->decimal('harga_satuan', 15, 2);
        $table->decimal('subtotal', 15, 2);
        $table->timestamps();

        // Foreign Key ke tabel Pesanan
        $table->foreign('pesanan_id')->references('pesanan_id')->on('pesanan')->onDelete('cascade');

        // Foreign Key ke tabel UMKM (merujuk ke umkm_id)
        $table->foreign('produk_id')->references('umkm_id')->on('umkm')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesanans');
    }
};
