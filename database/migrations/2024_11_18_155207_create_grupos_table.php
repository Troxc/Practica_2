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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('grupo', 10)->unique();
            $table->string('descripcion', 200);
            $table->integer('maxAlumnos');
            $table->foreignId('materia_id')->nullable()->constrained();
            $table->foreignId('periodo_id')->constrained();
            $table->foreignId('personal_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
