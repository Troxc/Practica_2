<?php

namespace Database\Factories;

use App\Models\Carrera;
use App\Models\Depto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarreraFactory extends Factory
{
    protected $model = Carrera::class;

    public function definition()
    {
        return [
            'idCarrera' => $this->faker->unique()->bothify('CAR###'),
            'depto_id' => Depto::factory(),
        ];
    }
}
