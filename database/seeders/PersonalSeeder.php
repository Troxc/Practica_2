<?php

namespace Database\Seeders;

use App\Models\Depto;
use App\Models\Personal;
use App\Models\Plaza;
use App\Models\Puesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PersonalSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        // Obtener el Departamento Dirección
        $deptoDireccion = Depto::where('nombreDepto', 'Dirección')->first();

        // Obtener el Departamento Subdirección
        $deptoSubdireccion = Depto::where('nombreDepto', 'Subdirección')->first();

        $sistemas = Depto::where('nombreCorto', 'ISC')->first();

        // Obtener plazas aleatorias (asumiendo que ya tienes plazas en la base de datos)
        $direccion = Puesto::where('tipo', 'Direccion')->inRandomOrder()->first();
        $docente = Puesto::where('tipo', 'Docente')->inRandomOrder()->first();

        // Crear personas y asignarles el departamento y plaza correspondiente
        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Gustavo Emilio',
            'apellidoP' => 'Rojo',
            'apellidoM' => 'Velázquez',
            'depto_id' => $deptoDireccion->id,
            'puesto_id' => $direccion->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Aida',
            'apellidoP' => 'Hernández',
            'apellidoM' => 'Ávila',
            'depto_id' => $deptoSubdireccion->id, // Asignar el departamento Subdirección
            'puesto_id' => $direccion->id, // Asignar plaza aleatoria
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Carlos',
            'apellidoP' => 'Patiño',
            'apellidoM' => 'Chávez',
            'depto_id' => $deptoSubdireccion->id, // Asignar el departamento Subdirección
            'puesto_id' => $direccion->id, // Asignar plaza aleatoria
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Ulises',
            'apellidoP' => 'Valdez',
            'apellidoM' => 'Rodríguez',
            'depto_id' => $deptoSubdireccion->id, // Asignar el departamento Subdirección
            'puesto_id' => $direccion->id, // Asignar plaza aleatoria
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        /// MAESTRIOS

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Antonio',
            'apellidoP' => 'Chávez',
            'apellidoM' => 'Soto',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Filiberto',
            'apellidoP' => 'Torres',
            'apellidoM' => 'Rábago',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Isidro',
            'apellidoP' => 'García',
            'apellidoM' => 'Sierra',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Aquiles',
            'apellidoP' => 'González',
            'apellidoM' => 'Ramos',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Guadalupe',
            'apellidoP' => 'Uribe',
            'apellidoM' => 'Miranda',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Roberto',
            'apellidoP' => 'Espinoza',
            'apellidoM' => 'Torres',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Rogelio Cesar',
            'apellidoP' => 'Rodríguez',
            'apellidoM' => 'Cervantes',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Lourdes Arlin',
            'apellidoP' => 'Campoy',
            'apellidoM' => 'Medrano',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'María Guadalupe',
            'apellidoP' => 'Nájera',
            'apellidoM' => 'Lozano',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);

        Personal::create([
            'rfc' => strtoupper($faker->lexify('????')) . $faker->numberBetween(1000, 9999),
            'nombres' => 'Flor de María',
            'apellidoP' => 'Rivera',
            'apellidoM' => 'Sánchez',
            'depto_id' => $sistemas->id,
            'puesto_id' => $docente->id,
            'fechaIngSep'=> $faker->date(),
            'fechaIngIns'=> $faker->date()
        ]);
    }
}
