<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Seeder;
use App\Models\Depto;
use App\Models\Carrera;
use App\Models\Reticula;
use App\Models\Materia;

class DeptoSeeder extends Seeder
{
    public function run()
    {

        // Creacion de departamentos
        $departamentos = [
            [
                'nombreDepto' => 'Direccion',
                'nombreMediano' => 'Direc',
                'nombreCorto' => 'Dc'
            ],
            [
                'nombreDepto' => 'Subdireccion',
                'nombreMediano' => 'SubDirec',
                'nombreCorto' => 'SubD'
            ],
            [
                'nombreDepto' => 'Ingenieria en Sistemas Computacionales',
                'nombreMediano' => 'IngSis',
                'nombreCorto' => 'ISC'
            ],
            [
                'nombreDepto' => 'Ingenieria Empresarial',
                'nombreMediano' => 'IngEmp',
                'nombreCorto' => 'IE'
            ],
            [
                'nombreDepto' => 'Ingenieria Mecanica',
                'nombreMediano' => 'IngMec',
                'nombreCorto' => 'IM'
            ],
            [
                'nombreDepto' => 'Ingenieria Mecatronica',
                'nombreMediano' => 'IngMec',
                'nombreCorto' => 'IME'
            ],
            [
                'nombreDepto' => 'Contador Publico',
                'nombreMediano' => 'Conta',
                'nombreCorto' => 'CP'
            ],
            [
                'nombreDepto' => 'Ingenieria Industrial',
                'nombreMediano' => 'IngInd',
                'nombreCorto' => 'II'
            ],
            [
                'nombreDepto' => 'Ingenieria en Gestion Empresarial',
                'nombreMediano' => 'IngGes',
                'nombreCorto' => 'IGE'
            ],
            [
                'nombreDepto' => 'Ciencias Basicas',
                'nombreMediano' => 'CieBas',
                'nombreCorto' => 'CB'
            ]
        ];
        foreach ($departamentos as $deptoData) {
            $depto = Depto::factory()->create([
                'nombreDepto' => $deptoData['nombreDepto'],
                'nombreMediano' => $deptoData['nombreMediano'],
                'nombreCorto' => $deptoData['nombreCorto'],
            ]);

            // Crear Carrera para cada depto que exista con el mismo nombre
            $carreras = ["ISC", "IE", "IM", "IME", "CP", "IGE", "II"];
            if (in_array($deptoData['nombreCorto'], $carreras)) {
                $carrera = Carrera::factory()->create([
                    'nombreCarrera' => $deptoData['nombreDepto'],
                    'nombreMediano' => $deptoData['nombreMediano'],
                    'nombreCorto' => $deptoData['nombreCorto'],
                    'depto_id' => $depto->id,
                ]);

                $carrerasConAlumnos = ["ISC", "IE", "IM", "IGE"];
                if (in_array($deptoData['nombreCorto'], $carrerasConAlumnos)) {
                    Alumno::factory(5)->create([
                        'carrera_id' => $carrera->id,
                    ]);
                }

                // Crear Retícula 
                $reticula = Reticula::factory()->create([
                    'carrera_id' => $carrera->id,
                ]);

                // Creacion de materias para ISC
                if ($deptoData['nombreCorto'] === "ISC") {
                    $materiasPorSemestre = [
                        1 => ['Fundamentos de programación', 'Calculo Diferencial', 'Matemáticas Discretas'],
                        2 => ['Algebra Lineal', 'Programación Orientada a Objetos', 'Contabilidad Financiera'],
                        3 => ['Estructuras de Datos', 'Sistemas operativos', 'Investigación de Operaciones'],
                        4 => ['Metodos Numéricos', 'Fundamentos de Bases de Datos', 'Ecuaciones Diferenciales'],
                        5 => ['Arquitectura de computadoras', 'Simulación', 'Fundamentos de Telecomunicaciones'],
                        6 => ['Ingeniería de Software', 'Redes de computadoras', 'Lenguajes y Autómatas'],
                        7 => ['Conmutación y enrutamiento', 'Sistemas Programables', 'Taller de Investigación'],
                        8 => ['Programación Web', 'Administración de redes', 'Programación Logica y Funcional'],
                        9 => ['Programación Web II', 'Inteligencia Artificial', 'Quimica'],
                    ];

                    foreach ($materiasPorSemestre as $semestre => $materias) {
                        foreach ($materias as $nombreMateria) {
                            Materia::factory()->create([
                                'nombreMateria' => $nombreMateria,
                                'semestre' => $semestre,
                                'reticula_id' => $reticula->id,
                            ]);
                        }
                    }
                }

                // Materias para IE
                if ($deptoData['nombreCorto'] === "IE") {
                    $materiasPorSemestre = [
                        1 => ['Calculo Diferencial', 'Matemáticas Discretas'],
                        2 => ['Programación Orientada a Objetos', 'Contabilidad Financiera'],
                        3 => ['Sistemas operativos', 'Investigación de Operaciones'],
                        4 => ['Fundamentos de Bases de Datos', 'Ecuaciones Diferenciales'],
                        5 => ['Simulación', 'Fundamentos de Telecomunicaciones'],
                        6 => ['Redes de computadoras', 'Lenguajes y Autómatas'],
                        7 => ['Sistemas Programables', 'Taller de Investigación'],
                        8 => ['Administración de redes', 'Programación Lógica y Funcional'],
                        9 => ['Inteligencia Artificial', 'Quimica'],
                    ];
                    foreach ($materiasPorSemestre as $semestre => $materias) {
                        foreach ($materias as $nombreMateria) {
                            Materia::factory()->create([
                                'nombreMateria' => $nombreMateria,
                                'semestre' => $semestre,
                                'reticula_id' => $reticula->id,
                            ]);
                        }
                    }
                }

            }
        }
    }
}
