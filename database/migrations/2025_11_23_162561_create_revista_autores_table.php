<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revista_autores', function (Blueprint $table) {
            $table->id('id_autor');
            $table->unsignedBigInteger('datos_personales'); // ← referencia a personas
            $table->timestamps();

            $table->foreign('datos_personales')
                ->references('id_personas')
                ->on('revista_personas_generales')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revista_autores');
    }
};
