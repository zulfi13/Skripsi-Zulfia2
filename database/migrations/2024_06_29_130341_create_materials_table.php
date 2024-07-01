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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rak_id');
            $table->string('item_number');
            $table->string('part_number');
            $table->string('product_name');
            $table->bigInteger('panjang')->nullable();
            $table->bigInteger('lebar')->nullable();
            $table->bigInteger('tinggi')->nullable();
            $table->bigInteger('jr')->nullable();
            $table->bigInteger('qty_box')->nullable();
            $table->bigInteger('qty_pack')->nullable();    
            $table->bigInteger('volume')->nullable();
            $table->bigInteger('total_volume')->nullable();
            $table->timestamps();

            $table->foreign('rak_id')->references('id')->on('raks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
