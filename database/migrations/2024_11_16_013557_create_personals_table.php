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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('RFC', 100);
            $table->string('nombres', 50);
            $table->string('apellidoP', 50);
            $table->string('apellidoM', 50);
            $table->string('licenciatura',200)->nullable();
            $table->string('lictic', 1)->nullable();
            $table->string('especializacion',200)->nullable();
            $table->string('espetit',1)->nullable();
            $table->string('maestria',200)->nullable();
            $table->string('maetit',1)->nullable();
            $table->string('doctorado',200)->nullable();
            $table->string('doctit',1)->nullable();
            $table->date('fechaIngSep');
            $table->date('fechaIngIns');
            $table->foreignId('depto_id')->constrained();
            $table->foreignId('puesto_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
