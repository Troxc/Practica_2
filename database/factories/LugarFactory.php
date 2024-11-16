<?php

namespace Database\Factories;

use App\Models\Edificio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lugar>
 */
class LugarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombreLugar' => 'Salon D1',  // Valor inicial que se sobrescribirá en el seeder
            'nombreCorto' => 'D1',        // Valor inicial que se sobrescribirá en el seeder
            'edificio_id' => Edificio::factory(),  // Asocia cada lugar a un edificio
        ];
    }
}
