<?php

namespace Database\Factories;

use App\Models\Depto;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeptoFactory extends Factory
{
    protected $model = Depto::class;

    public function definition()
    {
        return [
            'idDepto' => $this->faker->unique()->bothify('DEP###'),
        ];
    }
}
