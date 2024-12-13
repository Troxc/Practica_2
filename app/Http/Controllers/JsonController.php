<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto;
use App\Models\Edificio;
use App\Models\Grupo;
use App\Models\GrupoHorario;
use App\Models\Lugar;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Personal;
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

    public function docentes()
    {
        $docentes = Personal::get();
        return $docentes;
    }

    public function grupos(Request $request)
    {
        $grupo = Grupo::where('grupo', $request->grupo)->first();
        $materia = $grupo->materia;
        $personal = $grupo->personal;
        if ($grupo) {
            return response()->json(['message' => 'Se encontro Grupo', 'registro' => $grupo, 'ma' => $materia, 'pe' => $personal]);
        }
    }

    public function agregarGrupo(Request $request)
    {

        try {
            $validado = $request->validate([
                'grupo' => 'required',
                'descripcion' => 'required',
                'maxAlumnos' => 'required',
                'fecha' => 'required',
                'materia_id' => 'required',
                'periodo_id' => 'required',
                'personal_id' => 'required',
                'carrera_id' => 'required',
            ]);
            $grupo = Grupo::create($validado);
            return response()->json(['message' => 'Agrego Correctamente', 'ok' => 1, 'idGrupo' => $grupo->id]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error en Algo, Verifique', 'ok' => 0]);
        }
    }

    public function actualizarGrupo(Request $request)
    {

        try {
            $validado = $request->validate([
                'grupo' => 'required',
                'descripcion' => 'required',
                'maxAlumnos' => 'required',
                'fecha' => 'required',
                'materia_id' => 'required',
                'periodo_id' => 'required',
                'personal_id' => 'required',
                'carrera_id' => 'required',
            ]);
            $grupo = Grupo::where('id', $request->idGrupo)->first();
            $grupo->update($validado);
            return response()->json(['message' => 'Actualizado Correctamente', 'ok' => 1, 'idGrupo' => $grupo->id]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error en Algo, Verifique', 'ok' => 0]);
        }
    }

    public function eliminarGrupo(Request $request)
    {

        try {
            $grupo = Grupo::where('id', $request->idGrupo)->first();
            $grupo->delete();
            return response()->json(['message' => 'Eliminado Correctamente', 'ok' => 1]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error en Algo, Verifique', 'ok' => 0]);
        }
    }

    public function horasGrupo(Request $request)
    {
        $grupoHoras = GrupoHorario::where('grupo_id', $request->grupo)->where('lugar_id', $request->lugar)->get()->toArray();

        return response()->json(['otro' => $grupoHoras]);
    }

    public function horas(Request $request)
    {
        try {
            $validado = $request->validate([
                'grupo_id' => 'required',
                'lugar_id' => 'required',
                'dia' => 'required',
                'hora' => 'required'
            ]);
            $existe = GrupoHorario::where($validado)->exists();

            if($existe){
                GrupoHorario::where($validado)->delete();
                return response()->json(['message' => 'Hora Eliminada']);
            }else{
                $nuevo = GrupoHorario::create($validado);
                return response()->json(['message' => 'Hora Agregada']);
            }

        } catch (\Exception $e) {
            return response()->json(['message' => 'Error en Algo, Verifique', 'ok' => 0]);
        }
    }
}
