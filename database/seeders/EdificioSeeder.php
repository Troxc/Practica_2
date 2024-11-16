<?php

namespace Database\Seeders;

use App\Models\Edificio;
use App\Models\Lugar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EdificioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Creación del Edificio D con 8 lugares
        $edificioD = Edificio::create([
            'nombreEdificio' => 'Edificio D',
            'nombreCorto' => 'EdiD',
        ]);

        foreach (range(1, 8) as $i) {
            Lugar::create([
                'nombreLugar' => "Salon D{$i}",
                'nombreCorto' => "D{$i}",
                'edificio_id' => $edificioD->id,
            ]);
        }

        // Creación del Edificio K con 13 lugares
        $edificioK = Edificio::create([
            'nombreEdificio' => 'Edificio K',
            'nombreCorto' => 'EdiK',
        ]);

        foreach (range(1, 13) as $i) {
            Lugar::create([
                'nombreLugar' => "Salon K{$i}",
                'nombreCorto' => "K{$i}",
                'edificio_id' => $edificioK->id,
            ]);
        }

        // Creación del Laboratorio de Sistemas con lugares especiales
        $labSistemas = Edificio::create([
            'nombreEdificio' => 'Laboratorio de Sistemas',
            'nombreCorto' => 'Lab Sis',
        ]);

        $lugaresLab = [
            ['nombreLugar' => 'Sala C', 'nombreCorto' => 'C'],
            ['nombreLugar' => 'Sala E', 'nombreCorto' => 'E'],
            ['nombreLugar' => 'Sala D', 'nombreCorto' => 'D'],
            ['nombreLugar' => 'Sala R', 'nombreCorto' => 'R'],
            ['nombreLugar' => 'Sala Valerdi', 'nombreCorto' => 'V'],
        ];

        foreach ($lugaresLab as $lugar) {
            Lugar::create([
                'nombreLugar' => $lugar['nombreLugar'],
                'nombreCorto' => $lugar['nombreCorto'],
                'edificio_id' => $labSistemas->id,
            ]);
        }
    }
}
