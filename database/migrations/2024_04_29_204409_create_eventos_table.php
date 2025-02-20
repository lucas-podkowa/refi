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
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('observacion')->nullable();
            $table->foreignId('turno_id')->constrained('turno');
            $table->foreignId('actividad_id')->constrained('actividad');
            $table->foreignId('asignatura_id')->constrained('asignatura');
            $table->foreignId('user_id')->constrained('users'); // Relación con usuario
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento');
    }
};
