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
        Schema::create('incoming_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incoming_id');
            $table->string('references');
            $table->string('no_po');
            $table->string('no_sj');   
            $table->string('no_harness')->nullable();
            $table->string('item');
            $table->string('alias');
            $table->string('pn');
            $table->bigInteger('qty_kedatangan');
            $table->bigInteger('qty_actual');
            $table->string('user_by');
            $table->decimal('volume', 12, 4);
            $table->bigInteger('luasan');
            $table->timestamps();

            $table->foreign('incoming_id')->references('id')->on('incomings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_items');
    }
};
