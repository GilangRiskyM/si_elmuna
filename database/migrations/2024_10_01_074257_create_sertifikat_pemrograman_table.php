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
        Schema::create('sertifikat_pemrograman', function (Blueprint $table) {
            $table->id();
            $table->string('no_sertifikat')->nullable(false);
            $table->string('nama')->nullable(false);
            $table->string('tempat_lahir')->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->string('nis')->nullable(false);
            $table->string('program')->nullable(false);
            $table->date('tgl_mulai')->nullable(false);
            $table->date('tgl_selesai')->nullable(false);
            $table->string('mapel1')->nullable(false);
            $table->string('mapel2')->nullable(true);
            $table->string('mapel3')->nullable(true);
            $table->string('mapel4')->nullable(true);
            $table->string('mapel5')->nullable(true);
            $table->string('nilai1')->nullable(false);
            $table->string('nilai2')->nullable(true);
            $table->string('nilai3')->nullable(true);
            $table->string('nilai4')->nullable(true);
            $table->string('nilai5')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikat_pemrograman');
    }
};
