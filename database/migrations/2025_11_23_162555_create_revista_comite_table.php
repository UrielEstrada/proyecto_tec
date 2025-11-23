<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revista_comite', function (Blueprint $table) {
            $table->id('id_comite');
            $table->unsignedBigInteger('id_personas');
            $table->string('cargo'); // presidente, secretaria, comité científico, etc.
            $table->timestamps();

            $table->foreign('id_personas')
                  ->references('id_personas')
                  ->on('revista_personas_generales')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revista_comite');
    }
};
