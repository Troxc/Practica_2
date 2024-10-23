<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Depto;
use App\Models\Materia;
use App\Models\Reticula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Depto::factory(1)
        ->has(Carrera::factory(2)
            ->has(Alumno::factory(3))
            ->has(Reticula::factory(3)
                ->has(Materia::factory(4))))
            
        ->create();
    }
}
