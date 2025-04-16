<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSppSiswaTable extends Migration
{
    public function up()
    {
        Schema::table('siswa', function (Blueprint $table) {
            // Menambahkan kolom id_spp sebagai foreign key
            $table->unsignedBigInteger('id_spp')->nullable(); // Kolom id_spp

            // Membuat relasi dengan tabel spp
            $table->foreign('id_spp')->references('id_spp')->on('spp')->onDelete('cascade'); // Relasi ke tabel spp
        });
    }

    public function down()
    {
        Schema::table('siswa', function (Blueprint $table) {
            // Menghapus foreign key dan kolom id_spp jika rollback migrasi
            $table->dropForeign(['id_spp']);
            $table->dropColumn('id_spp');
        });
    }
}
