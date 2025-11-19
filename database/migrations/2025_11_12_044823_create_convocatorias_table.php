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
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id('id_convocatoria');
            $table->string('nombre');
            $table->year('anio');
            $table->string('pdf_path')->nullable(); // Para PDF de convocatoria
            $table->foreignId('id_posgrado')->constrained('posgrados', 'id_posgrado')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocatorias');
    }
};
