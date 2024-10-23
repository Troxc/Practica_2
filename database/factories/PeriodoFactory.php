<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodo>
 */
class PeriodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fecha = fake()->date();

        $ini = new DateTime($fecha);
        $fin = (clone $ini)->modify('+6 months');
        return [
            'idPeriodo' => fake()->bothify("??###"),
            'periodo' => fake()->randomElement(['Periodo1','Periodo2']),
            'descCorta' => substr(fake()->word(), 0, 10),
            'fechaIni' => $ini,
            'fechaFin' => $fin,
        ];
    }
}
