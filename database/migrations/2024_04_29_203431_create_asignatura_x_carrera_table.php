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
        Schema::create('asignatura_x_carrera', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asignatura_id')->constrained('asignatura')->onDelete('cascade');
            $table->foreignId('carrera_id')->constrained('carrera')->onDelete('cascade');
            $table->index(['asignatura_id', 'carrera_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignatura_x_carrera');
    }
};
