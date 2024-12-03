<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo17126;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Personal;

class Grupo17126Seeder extends Seeder
{
    public function run()
    {
        // Obtener algunas materias, periodos y personal para asignarles a los grupos
        $materias = Materia::all();
        $periodos = Periodo::all();
        $personals = Personal::all();

        // Crear 10 grupos con datos aleatorios o predefinidos
        for ($i = 1; $i <= 50; $i++) {
            Grupo17126::create([
                'grupo' => 'G' . str_pad($i, 4, '0', STR_PAD_LEFT), // Crear grupo G0001, G0002, etc.
                'descripcion' => 'Grupo de ' . ($i % 2 == 0 ? 'Lunes' : 'Martes'), // Descripción aleatoria
                'maxAlumnos' => rand(20, 30), // Número aleatorio de alumnos entre 20 y 30
                'materia_id' => $materias->isNotEmpty() ? $materias->random()->id : null, // Materia aleatoria
                'periodo_id' => $periodos->isNotEmpty() ? $periodos->random()->id : null, // Periodo aleatorio
                'personal_id' => $personals->isNotEmpty() ? $personals->random()->id : null, // Personal aleatorio
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
