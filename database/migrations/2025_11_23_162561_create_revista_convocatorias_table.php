<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revista_convocatorias', function (Blueprint $table) {
            $table->id('id_convoca');
            $table->date('fecha');
            $table->string('archivoconvoca')->nullable();   // PDF
            $table->string('archivoguia')->nullable();      // PDF
            $table->string('archivoejemplo')->nullable();   // PDF
            $table->unsignedBigInteger('id_numero');        // número de revista
            $table->timestamps();

            $table->foreign('id_numero')
                  ->references('id_numero')
                  ->on('revista_numeros')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revista_convocatorias');
    }
};
