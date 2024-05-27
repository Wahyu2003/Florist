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
        Schema::create('tanaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_tanaman', 30);
            $table->string('image_tanaman',100);
            $table->string('kategori_tanaman', 225);
            $table->string('deskripsi_tanaman', 225);
            $table->integer('size_tanaman');
            $table->integer('suhu_tanaman');
            $table->integer('kelembapan_tanaman');
            $table->integer('harga_tanaman');
            $table->integer('stok_tanaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanaman');
    }
};
