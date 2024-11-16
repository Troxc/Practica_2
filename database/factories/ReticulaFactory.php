<?php

namespace Database\Factories;

use App\Models\Carrera;
use App\Models\Reticula;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReticulaFactory extends Factory
{
    protected $model = Reticula::class;

    public function definition()
    {
        return [
            'descripcion' => $this->faker->sentence(2),
            'fechaVigor' => $this->faker->date(),
            'carrera_id' => Carrera::factory(),
        ];
    }
}
