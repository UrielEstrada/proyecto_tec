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
        Schema::create('area_conocimientos', function (Blueprint $table) {
            $table->id('id_area');
            $table->string('nombre');
            $table->unsignedBigInteger('id_posgrado');
            $table->timestamps();

            $table->foreign('id_posgrado')
                ->references('id_posgrado')
                ->on('posgrados')
                ->onDelete('cascade');
        });
    } // <-- Este cierra el método up() correctamente

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('area_conocimientos', function (Blueprint $table) {
            $table->dropForeign(['id_posgrado']);
        });

        Schema::dropIfExists('area_conocimientos');
    }
};
