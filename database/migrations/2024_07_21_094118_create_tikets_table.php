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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('wisata_id')->constrained('wisatas');
            $table->timestamp('waktu_beli');
            $table->date('waktu_kunjung');
            $table->string('metode_pembayaran');
            $table->enum('status_pembayaran', ['dibayar', 'belum dibayar', 'pending']); 
            $table->integer('kuantitas');
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
