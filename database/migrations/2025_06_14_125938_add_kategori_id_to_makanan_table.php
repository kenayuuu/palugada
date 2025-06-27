<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::table('niken_makanan', function (Blueprint $table) {
                $table->unsignedBigInteger('kategori_id')->nullable()->after('id');
                $table->foreign('kategori_id')->references('id')->on('niken_kategori')->onDelete('set null');
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('niken_makanan', function (Blueprint $table) {
            //
        });
    }
};
