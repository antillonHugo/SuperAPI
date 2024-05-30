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
        Schema::create('producto_proveedor', function (Blueprint $table) {
            $table->id('cod_producto_proveedor');
            $table->unsignedBigInteger('cod_producto');//clave foranea
            $table->unsignedBigInteger('proveedor_id');
            $table->decimal('cantidad');
            $table->dateTime('fecha_ingreso');
            $table->foreign('cod_producto')->references('cod_producto')->on('producto');
            $table->foreign('proveedor_id')->references('proveedor_id')->on('proveedor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_proveedor');
    }
};
