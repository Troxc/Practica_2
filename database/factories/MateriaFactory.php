<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaFactory extends Factory
{
    protected $model = Materia::class;

    public function definition()
    {
        return [
            'nombreMateria' => $this->faker->optional()->sentence(3), // Solo si no se pasa desde el seeder
            'nombreMediano' => fn(array $attributes) => implode('', array_map(
                fn($word) => substr($word, 0, 3), 
                explode(' ', $attributes['nombreMateria'])
            )),
            'nombreCorto' => fn(array $attributes) => implode('', array_map(
                fn($word) => strtoupper($word[0]),
                // Filtramos las palabras vacías antes de tomar las iniciales
                array_filter(explode(' ', $attributes['nombreMateria']), function($word) {
                    $stopWords = ['y', 'a', 'de', 'en', 'el', 'la', 'los', 'las', 'que', 'del', 'un', 'una']; // Palabras vacías
                    return !in_array(strtolower($word), $stopWords); // Filtrar las palabras vacías
                })
            )),
            'nivel' => 'L',
            'modalidad' => $this->faker->randomElement(['P', 'O']),
            'semestre' => 1, // Esto se sobrescribirá desde el seeder
            'reticula_id' => 1, // Esto también se sobrescribirá desde el seeder
        ];
    }
}
