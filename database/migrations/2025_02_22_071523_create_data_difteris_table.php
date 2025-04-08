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
        Schema::create('data_difteri', function (Blueprint $table) {
            $table->id('id_data');
            $table->foreignId('id_tahun');
            $table->foreignId('id_kecamatan');
            $table->float('jml_kepadatan');
            $table->integer('jml_rumah_tidak_sehat');
            $table->integer('jml_vaksinasi_dpt');
            $table->integer('jml_kasus_difteri');
            $table->string('cluster')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_difteri');
    }
};
