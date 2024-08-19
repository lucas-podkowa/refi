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
        Schema::create('dictado_comun', function (Blueprint $table) {
            $table->foreignId('asignatura_1')->constrained('asignatura');
            $table->foreignId('asignatura_2')->constrained('asignatura');
            $table->timestamps();

            $table->primary(['asignatura_1', 'asignatura_2']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equivalencia');
    }
};
