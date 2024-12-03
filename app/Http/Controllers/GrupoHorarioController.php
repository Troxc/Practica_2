<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto;
use App\Models\Grupo;
use App\Models\GrupoHorario;
use App\Models\Materia;
use App\Models\Periodo;
use Illuminate\Http\Request;

class GrupoHorarioController extends Controller
{
    
    public function index()
    {
        $periodos = Periodo::get();
        $carreras = Carrera::get();
        $deptos   = Depto::get();
        $prueba1M = Grupo::get();

        $carrera        = Carrera::find(session("carrera_idG"));

        $gp = Grupo::where('periodo_id', session('periodo_idG') )->where('grupo', session('InNombre'))->get();
        //return $gp;

        $depto = Depto::find('3');
        $personal = $depto->personals;
    
        $materias = $carrera->reticulas->flatMap(function($reticula) {
            return $reticula->materias;
        });
        
        return view('grupos/index2', ['personal' => $personal, 'deptos' => $deptos, 'periodos' => $periodos, 'carreras' => $carreras, 'materias' => $materias, 'prueba1M' => $prueba1M, 'gp' => $gp]);
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
/* 
        $grupo = Grupo::where("grupo", session("InNombre"))->first();
        
        $grupo->materia_id = $request->materia;
        $grupo->save();


        return back();  */

       $grupo = Grupo::where("grupo", session("InNombre"))->first();
        
        $grupo->personal_id = $request->persona;
        $grupo->save();


        return back(); 
    
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoHorario $grupoHorario)
    {
        //
    }
}
