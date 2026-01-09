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
    Schema::create('pesanan', function (Blueprint $table) {
        $table->id('pesanan_id'); // Primary Key
        $table->string('nomor_pesanan')->unique(); // UNQ
        
        // Gunakan unsignedInteger karena tabel warga pakai increments (INT)
        $table->unsignedInteger('warga_id'); 
        $table->foreign('warga_id')->references('warga_id')->on('warga')->onDelete('cascade');

        $table->decimal('total', 15, 2); // DECIMAL
        $table->string('status')->default('pending');
        $table->text('alamat_kirim');
        $table->string('rt', 5);
        $table->string('rw', 5);
        $table->string('metode_bayar');
        $table->string('bukti_bayar')->nullable(); // Folder media
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
