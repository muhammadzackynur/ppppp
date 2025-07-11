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
        Schema::table('jenis_makanan', function (Blueprint $table) {
            $table->timestamps(); // ✅ Tambahkan baris ini
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      // Schema::table('jenis_makanan', function (Blueprint $table) {
       //     $table->dropTimestamps(); // Tambahkan juga untuk rollback
       // }); 
    }
};
