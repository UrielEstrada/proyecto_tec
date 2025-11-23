<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revista_numeros', function (Blueprint $table) {
            $table->id('id_numero');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('id_tematica'); // Relación con temática
            $table->timestamps();

            $table->foreign('id_tematica')
                  ->references('id_tematica')
                  ->on('revista_tematica')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revista_numeros');
    }
};
