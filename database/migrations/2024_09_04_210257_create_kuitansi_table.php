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
        Schema::create('kuitansi', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(false);
            $table->string('guna_byr1')->nullable(false);
            $table->string('guna_byr2')->nullable();
            $table->string('guna_byr3')->nullable();
            $table->string('jumlah')->nullable(false);
            $table->string('terbilang')->nullable(false);
            $table->string('penerima')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuitansi');
    }
};
