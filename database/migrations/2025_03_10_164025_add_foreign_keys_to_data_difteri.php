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
        Schema::table('data_difteri', function (Blueprint $table) {
            $table->foreign('id_tahun')->references('id_tahun')->on('tahuns')->onDelete('cascade');
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_difteri', function (Blueprint $table) {
            $table->dropForeign(['id_tahun']);
            $table->dropForeign(['id_kecamatan']);
        });
    }
};
