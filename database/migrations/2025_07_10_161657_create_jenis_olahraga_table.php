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
        Schema::create('jenis_olahraga', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('image')->nullable(); // <-- TAMBAHKAN BARIS INI
            $table->enum('kategori', ['Kardio', 'Kekuatan', 'Fleksibilitas', 'keseimbangan', 'keterampilan/rekreasi']);
            $table->integer('durasi_menit')->nullable();
            $table->timestamps(); // Menggantikan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_olahraga');
    }
};
