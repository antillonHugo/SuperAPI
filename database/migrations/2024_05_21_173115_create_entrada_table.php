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
        Schema::create('entrada', function (Blueprint $table) {
            $table->id('cod_entrada');
            $table->unsignedBigInteger('cod_producto');//clave foranea
            $table->decimal('cantidad');
            $table->dateTime('fecha_ingreso');
            $table->foreign('cod_producto')->references('cod_producto')->on('producto');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrada');
    }
};
