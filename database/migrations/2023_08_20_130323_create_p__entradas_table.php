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
        Schema::create('p__entradas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pieza')->unsigned()->references('id')->on('piezas')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_user')->unsigned()->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p__entradas');
    }
};
