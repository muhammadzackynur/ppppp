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
        // Membuat tabel dengan nama 'jadwal_olahraga' (singular) sesuai pesan error
        Schema::create('jadwal_olahraga', function (Blueprint $table) {
            $table->id();

            // Kolom untuk menghubungkan dengan tabel 'users'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Kolom untuk menghubungkan dengan tabel 'jenis_olahraga'
            $table->foreignId('jenis_olahraga_id')->constrained('jenis_olahraga')->onDelete('cascade');
            
            $table->date('tanggal');
            $table->integer('durasi_menit');
            
            $table->timestamps(); // Membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_olahraga');
    }
};
