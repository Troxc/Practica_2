<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Prin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            DeptoSeeder::class,
            PlazaSeeder::class,
            PuestoSeeder::class,
            PeriodoSeeder::class,    
            EdificioSeeder::class,   
            PersonalSeeder::class,
            PlazaPersonalSeeder::class   
        ]);
    }
}
