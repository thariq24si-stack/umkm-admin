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
        Schema::create('warga_files', function (Blueprint $table) {
            $table->id(); // bigint auto_increment primary key
            $table->unsignedInteger('warga_id'); // HARUS sama tipe dengan warga.warga_id (int unsigned)
            $table->string('filename');
            $table->timestamps();

            // foreign key constraint
            $table->foreign('warga_id')
                  ->references('warga_id')
                  ->on('warga')
                  ->onDelete('cascade'); // jika warga dihapus, file ikut terhapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga_files');
    }
};
