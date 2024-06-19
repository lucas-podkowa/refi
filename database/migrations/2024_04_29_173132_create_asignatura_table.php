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
            $table->foreignId('dictado')->constrained('dictado')->onDelete('cascade');
            $table->foreignId('carrera')->constrained('carrera')->onDelete('cascade');
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
