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
        Schema::create('puskesmas', function (Blueprint $table) {
            $table->id('id_puskesmas');
            $table->string('nama_puskesmas');
            $table->string('alamat_puskesmas');
            $table->string('telp_puskesmas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puskesmas');
    }
};
