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
        Schema::create('grupo_horario17126s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo17126_id')->constrained();
            $table->timestamps();
            $table->foreignId('lugar_id')->constrained();
            $table->string('dia');
            $table->time('hora');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_horario17126s');
    }
};
