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
        Schema::create('producto', function (Blueprint $table) {
            $table->id('cod_producto');
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('stock',5,2);
            $table->unsignedBigInteger('cod_categoria'); // llave foránea
            $table->unsignedBigInteger('cod_unidadmedida');//llave foranea
            $table->foreign('cod_categoria')->references('cod_categoria')->on('categoria');
            $table->foreign('cod_unidadmedida')->references('cod_unidadmedida')->on('unidadesmedida');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
