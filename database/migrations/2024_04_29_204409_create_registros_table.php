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
        Schema::create('registro', function (Blueprint $table) {
            $table->increments('registro_id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('observacion');
            $table->foreignId('actividad_id')->constrained('actividad');
            $table->foreignId('asignatura_id')->constrained('asignatura');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro');
    }
};
