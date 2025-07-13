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
        Schema::create('jenis_makanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('image')->nullable();
            $table->integer('kalori_per_porsi')->nullable();
            $table->enum('kategori', ['Sarapan', 'Makan Siang', 'Makan Malam', 'Camilan']);
            $table->enum('cocok_untuk_diet', ['Rendah Karbo', 'Rendah Lemak', 'Vegan', 'Normal'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_makanan');
    }
};
