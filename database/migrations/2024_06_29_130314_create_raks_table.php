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
        Schema::create('raks', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('alamat');
            $table->bigInteger('panjang')->nullable();
            $table->bigInteger('lebar')->nullable();
            $table->bigInteger('tinggi')->nullable();
            $table->bigInteger('tinggi_atas')->nullable();
            $table->bigInteger('tinggi_total')->nullable();
            $table->bigInteger('volume');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raks');
    }
};
