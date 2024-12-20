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
        Schema::create('fecha_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->date('fechaIni');
            $table->date('fechaFin');
            $table->foreignId('periodo_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fecha_seguimientos');
    }
};
