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
        Schema::table('pesan_tiket', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->after('id_pesan')->required();
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesan_tiket', function (Blueprint $table) {
            $table->dropColumn('id_user');
        });
    }
};
