<?php

namespace Database\Seeders;

use App\Models\Plaza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definir los idPlaza y nombrePlaza que deseas asignar
        $plazas = [
            ['idPlaza' => 'E3817', 'nombrePlaza' => 'Plaza Norte'],
            ['idPlaza' => 'E3815', 'nombrePlaza' => 'Plaza Sur'],
            ['idPlaza' => 'E3717', 'nombrePlaza' => 'Plaza Este'],
            ['idPlaza' => 'E3617', 'nombrePlaza' => 'Plaza Oeste'],
            ['idPlaza' => 'E3520', 'nombrePlaza' => 'Plaza Centro'],
        ];

        // Crear las plazas especificadas
        foreach ($plazas as $plazaData) {
            Plaza::create($plazaData);
        }
    }
}
