<?php

namespace Database\Seeders;

use App\Models\Personal;
use App\Models\Plaza;
use App\Models\PlazaPersonal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlazaPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persona = Personal::where('nombres', 'Antonio')->first();
        $plaza   = Plaza::inRandomOrder()->first();

        PlazaPersonal::create(
            [
                'tipoNombramiento'  => 666,
                'plaza_id'          => $plaza->id,
                'personal_id'       => $persona->id
            ]
        );
    }
}
