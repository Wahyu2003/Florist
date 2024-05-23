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
        Schema::create('user__penggunas', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('nama_lengkap');
            $table->string('foto_profil');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('alamat_rumah');
            $table->string('no_telp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__penggunas');
    }
};
