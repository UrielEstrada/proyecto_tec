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
        Schema::create('plan_estudios', function (Blueprint $table) {
            $table->id('id_plan');
            $table->string('nombre');
            $table->string('pdf_path')->nullable(); // Para PDF del plan
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
        Schema::dropIfExists('plan_estudios');
    }
};
