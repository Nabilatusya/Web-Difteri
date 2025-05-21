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
        Schema::table('puskesmas', function (Blueprint $table) {
            $table->text('identitas_puskesmas')->nullable();
            $table->string('gambar_puskesmas')->nullable();
            $table->text('motto')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('jam_layanan')->nullable();
            $table->text('pelayanan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('puskesmas', function (Blueprint $table) {
            $table->dropColumn(['identitas_puskesmas', 'gambar_puskesmas', 'motto', 'visi', 'misi', 'jam_layanan', 'pelayanan']);
        });
    }
};
