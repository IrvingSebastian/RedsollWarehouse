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
        Schema::create('piezas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');
            $table->string('entradas');
            $table->string('salidas');
            $table->string('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piezas');
    }
};
