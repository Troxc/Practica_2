<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Puesto;

class PuestoSeeder extends Seeder
{
    public function run()
    {
    
        $tipos = ['Docente', 'Direccion', 'No Docente', 'Auxiliar', 'Administrativo'];

        foreach ($tipos as $tipo) {
            Puesto::factory()->count(3)->create([
                'tipo' => $tipo,
            ]);
        }
    }
}
