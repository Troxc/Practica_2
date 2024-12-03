<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\alumnoGrupo;
use App\Models\Grupo17126;


class AlumnoGrupoSeeder extends Seeder
{
    public function run()
    {
        // Obtener todos los alumnos y grupos disponibles
        $alumnos = Alumno::all();
        $grupos = Grupo17126::all();

        // Crear 50 registros aleatorios en la tabla alumno_grupos
        for ($i = 0; $i < 50; $i++) {
            alumnoGrupo::create([
                'alumno_id' => $alumnos->random()->id, // Seleccionar un alumno aleatorio
                'grupo17126_id' => $grupos->random()->id, // Seleccionar un grupo aleatorio
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}