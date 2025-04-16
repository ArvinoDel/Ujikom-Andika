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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('nis')->unique();
            $table->string('nama');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_kelas');
            $table->text('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->unsignedBigInteger('id_spp')->nullable(); // kalau ada tabel spp, kalau belum bisa skip dulu
            $table->timestamps();
        
            // Relasi ke users dan kelas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
