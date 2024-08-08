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
        Schema::create('asignatura', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('codigo', 8);
            $table->unsignedTinyInteger('ciclo');
            $table->string('responsable', 50)->nullable();
            $table->unsignedBigInteger('dictado_id');
            $table->unsignedBigInteger('carrera_id');
            $table->foreign('dictado_id')->references('id')->on('dictado')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carrera')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignatura');
    }
};
