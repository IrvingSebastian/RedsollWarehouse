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
        Schema::create('pieza_news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pieza_id');
            $table->boolean('salida');
            $table->boolean('entrada');
            $table->boolean('devolucion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieza_news');
    }
};
