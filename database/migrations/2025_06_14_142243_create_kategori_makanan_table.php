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
        if (!Schema::hasTable('kategori_makanan')) {
    Schema::create('kategori_makanan', function (Blueprint $table) {
        $table->id();
        $table->foreignId('makanan_id');
        $table->foreignId('kategori_id');
        $table->timestamps();
    });
}


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_makanan');
    }
};
