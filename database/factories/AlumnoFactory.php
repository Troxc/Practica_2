<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carrera;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'noctrl' => fake()->bothify("########"),
            'nombre' => fake()->name(),
            'apellidoP' => fake()->lastName(),
            'apellidoM' => fake()->lastName(),
            'apellidoM' => fake()->lastName(),
            'sexo'      => fake()->randomElement(['M','F']),
            'email' => fake()->email(),
            'carrera_id'=>Carrera::factory(),
        ];
    }
}
