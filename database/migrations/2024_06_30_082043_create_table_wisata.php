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
        Schema::create('table_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->text('alamat_wisata');
            $table->text('deskripsi_wisata');
            $table->integer('harga_wisata');
            $table->string('gambar_wisata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_wisata');
    }
};
