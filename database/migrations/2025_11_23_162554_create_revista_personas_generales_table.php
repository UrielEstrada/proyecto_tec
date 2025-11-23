<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revista_personas_generales', function (Blueprint $table) {
            $table->id('id_personas');
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m')->nullable();
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revista_personas_generales');
    }
};
