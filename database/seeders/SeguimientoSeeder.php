<?php

namespace Database\Seeders;

use App\Models\FechaSeguimiento;
use App\Models\Periodo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeguimientoSeeder extends Seeder
{
    public function run()
    {
        // Obtener los períodos existentes de la base de datos
        $periodos = Periodo::all(); // Cambia 'periodos' por el nombre real de tu tabla de períodos.

        foreach ($periodos as $periodo) {
            // Extraer el tipo de período (ENE-JUN o AGO-DIC) y el año
            $tipoPeriodo = substr($periodo->periodo, 0, 7);
            $anioCorto = substr($periodo->periodo, -2);
            $anio = '20' . $anioCorto;
        

            if ($tipoPeriodo == 'Ene-Jun') {
                // Fechas para el período ENE-JUN
                $fechas = [
                    ['desc' => 'Primer Seguimiento', 'fechaIni' => "{$anio}-03-07", 'fechaFin' => "{$anio}-03-11"],
                    ['desc' => 'Segundo Seguimiento', 'fechaIni' => "{$anio}-04-25", 'fechaFin' => "{$anio}-04-29"],
                    ['desc' => 'Tercer Seguimiento', 'fechaIni' => "{$anio}-05-29", 'fechaFin' => "{$anio}-06-03"],
                    ['desc' => 'Cuarto Seguimiento', 'fechaIni' => "{$anio}-06-05", 'fechaFin' => "{$anio}-06-10"],
                ];
            } elseif ($tipoPeriodo == 'Ago-Dic') {
                // Fechas para el período AGO-DIC
                $fechas = [
                    ['desc' => 'Primer Seguimiento', 'fechaIni' => "{$anio}-09-16", 'fechaFin' => "{$anio}-09-20"],
                    ['desc' => 'Segundo Seguimiento', 'fechaIni' => "{$anio}-10-14", 'fechaFin' => "{$anio}-10-18"],
                    ['desc' => 'Tercer Seguimiento', 'fechaIni' => "{$anio}-11-11", 'fechaFin' => "{$anio}-11-15"],
                    ['desc' => 'Cuarto Seguimiento', 'fechaIni' => "{$anio}-12-09", 'fechaFin' => "{$anio}-12-13"],
                ];
            } else {
                $this->command->warn("No se encontraron fechas para el período: {$periodo->periodo} tipoPEriodo: {$tipoPeriodo}");
            }

            // Insertar los seguimientos para el período actual
            foreach ($fechas as $fecha) {
                DB::table('fecha_seguimientos')->insert([
                    'desc' => $fecha['desc'],
                    'fechaIni' => $fecha['fechaIni'],
                    'fechaFin' => $fecha['fechaFin'],
                    'periodo_id' => $periodo->id, // Relacionar con el ID del período
                ]);
            }
        }
    }
}
