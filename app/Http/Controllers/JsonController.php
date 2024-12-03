<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto;
use App\Models\Edificio;
use App\Models\Lugar;
use App\Models\Materia;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{
    public function semestres()
    {
        $materias = Materia::get();

        $materias = DB::table('materias')
        ->select(DB::raw('MIN(id) as id'), 'semestre') 
        ->groupBy('semestre')
        ->orderBy('semestre')
        ->get();

        return $materias;
    }

    public function materias()
    {
        $materias = Materia::get();

        return $materias;
    }

    public function deptos()
    {
        $deptos = Depto::get();

        $deptos = DB::table('deptos')
        ->select(DB::raw('MIN(id) as id'), 'nombreDepto') 
        ->groupBy('nombreDepto')
        ->orderBy('nombreDepto')
        ->get();

        return $deptos;
    }
    public function edificios()
    {
        $edificios = Edificio::get();
        return $edificios;
    }

    public function periodos()
    {
        $periodos = Periodo::get();
        return $periodos;
    }

    public function carreras()
    {
        $carreras = Carrera::get();
        return $carreras;
    }

    public function lugares()
    {
        $lugares = Lugar::get();
        return $lugares;
    }
}
