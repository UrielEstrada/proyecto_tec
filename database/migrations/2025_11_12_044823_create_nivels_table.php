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
        Schema::create('nivels', function (Blueprint $table) {
            $table->id('id_nivel');
            $table->string('nombre');
            $table->string('nivel');
            $table->unsignedBigInteger('id_posgrado');
            $table->foreign('id_posgrado')
                ->references('id_posgrado')
                ->on('posgrados')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nivels');
    }
};
