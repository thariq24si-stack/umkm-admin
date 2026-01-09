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
        Schema::create('umkm', function (Blueprint $table) {
            $table->increments('umkm_id'); 
            $table->string('nama_usaha');
            
            $table->unsignedInteger('pemilik_warga_id'); 
            
            $table->text('alamat');
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('kategori');
            $table->string('kontak');
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            $table->foreign('pemilik_warga_id')
                  ->references('warga_id')
                  ->on('warga')
                  ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};