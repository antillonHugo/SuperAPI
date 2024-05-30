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

        Schema::create('contactos', function (Blueprint $table) {
            $table->id('cod_contacto');
            $table->string('telefono');
            $table->unsignedBigInteger('cod_usuario');
            $table->foreign('cod_usuario')->references('cod_usuario')->on('usuario');
            // $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
