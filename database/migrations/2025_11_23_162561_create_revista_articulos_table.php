<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revista_articulos', function (Blueprint $table) {
            $table->id('id_articulos');
            $table->unsignedBigInteger('id_numero');   // número de revista
            $table->string('titulo');
            $table->string('archivo_pdf');             // ruta del PDF
            $table->date('fecha_publicidad')->nullable();
            $table->timestamps();

            $table->foreign('id_numero')
                  ->references('id_numero')
                  ->on('revista_numeros')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revista_articulos');
    }
};
