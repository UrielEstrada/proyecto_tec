<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revista_asigna_cobertura', function (Blueprint $table) {
            $table->id('id_asignacob');
            $table->unsignedBigInteger('id_numero');
            $table->unsignedBigInteger('id_tematica');
            $table->timestamps();

            $table->foreign('id_numero')
                  ->references('id_numero')
                  ->on('revista_numeros')
                  ->onDelete('cascade');

            $table->foreign('id_tematica')
                  ->references('id_tematica')
                  ->on('revista_tematica')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revista_asigna_cobertura');
    }
};
