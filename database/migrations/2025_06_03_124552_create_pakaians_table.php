<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $table = 'pakaians';
    public function up(): void
    {
        Schema::create('niken_pakaians', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ukuran')->nullable();
            $table->decimal('harga', 10, 2);
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakaians');
    }
};
