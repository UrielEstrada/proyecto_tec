<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revista_asignaautor', function (Blueprint $table) {
            $table->unsignedBigInteger('id_art');   // artículo
            $table->unsignedBigInteger('id_autor'); // autor

            // Relaciones
            $table->foreign('id_art')
                ->references('id_articulos')
                ->on('revista_articulos')
                ->onDelete('cascade');

            $table->foreign('id_autor')
                ->references('id_autor')
                ->on('revista_autores')
                ->onDelete('cascade');

            // Llave primaria compuesta
            $table->primary(['id_art', 'id_autor']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revista_asignaautor');
    }
};
