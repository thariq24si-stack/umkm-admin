<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id');
            $table->string('ref_table'); // Nama tabel yang menghubungkan media
            $table->unsignedBigInteger('ref_id'); // ID yang merujuk pada entitas terkait
            $table->string('file_name');
            $table->string('caption')->nullable();
            $table->string('mime_type');
            $table->integer('sort_order')->default(0); // Urutan file
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
};
