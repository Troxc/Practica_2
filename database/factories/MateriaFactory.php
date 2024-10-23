<?php

namespace Database\Factories;

use App\Models\Reticula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        $materias = [
            'Programación I', 'Programación II', 'Estructuras de Datos', 'Algoritmos Avanzados', 
            'Bases de Datos', 'Redes de Computadoras', 'Sistemas Operativos', 
            'Arquitectura de Computadoras', 'Ingeniería de Software', 'Desarrollo Web', 
            'Matemáticas Discretas', 'Cálculo Diferencial e Integral', 'Álgebra Lineal', 
            'Probabilidad y Estadística', 'Inteligencia Artificial', 'Seguridad Informática', 
            'Ciberseguridad', 'Criptografía', 'Administración de Proyectos de TI', 
            'Modelado de Sistemas', 'Diseño de Interfaces de Usuario', 'Desarrollo de Aplicaciones Móviles', 
            'Desarrollo de Software Ágil', 'Patrones de Diseño', 'Lenguajes de Programación', 
            'Teoría de la Computación', 'Compiladores', 'Minería de Datos', 
            'Sistemas Distribuidos', 'Computación en la Nube', 'Cómputo Paralelo', 
            'Internet de las Cosas (IoT)', 'Desarrollo de Videojuegos', 'Robótica', 
            'Procesamiento de Imágenes', 'Machine Learning', 'Big Data', 'Blockchain', 
            'Virtualización y Contenedores', 'Automatización de Procesos', 'Administración de Servidores', 
            'Testing de Software', 'Metodologías de Desarrollo', 'DevOps', 
            'Administración de Redes', 'Análisis de Algoritmos', 'Optimización de Sistemas', 
            'Simulación de Sistemas', 'Administración de Bases de Datos', 'Ingeniería de Requerimientos'
        ];
        $elegida = fake()->randomElement($materias);
        return [
            'idMateria' => fake()->bothify("###???"),
            'nombreMateria' => $elegida,
            'nivel' => fake()->randomElement([1,2,3,4,5,6,7,8,9]),
            'nombreMediano' =>substr($elegida,0,6),
            'nombreCorto'      =>substr($elegida,0,2),
            'modalidad'     =>fake()->randomElement(['A','B','C','D']),
            'reticula_id'=>Reticula::factory()
        ];
    }
}
