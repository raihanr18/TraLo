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
        Schema::create('pesan_tiket', function (Blueprint $table) {
            $table->id('id_pesan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_wisata');
            $table->string('tanggal_kunjungan');
            $table->integer('jumlah_tiket');
            $table->integer('harga_total');
            $table->enum('metode_pembayaran', ['dana', 'gopay', 'qris',' ']);
            $table->enum('status_pembayaran', ['dibatalkan', 'proses', 'dibayar']);
            $table->timestamps();

            // Tambahkan foreign key
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_wisata')->references('id_wisata')->on('wisata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesan_tiket', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_wisata']);
        });

        Schema::dropIfExists('pesan_tiket');
    }
};
