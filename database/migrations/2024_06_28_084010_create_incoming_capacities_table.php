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
        Schema::create('incoming_capacities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_kapasitas');
            $table->bigInteger('total_terpakai')->nullable();
            $table->bigInteger('sisa_kapasitas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_capacities');
    }
};
