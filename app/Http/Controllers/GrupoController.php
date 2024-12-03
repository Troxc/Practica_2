<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Personal;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\returnCallback;

class GrupoController extends Controller
{
    public $periodos, $carreras, $materias;
    public $periodo_idG, $carrera_idG, $InNombre, $InMaxA, $InDes, $InFecha, $grupos, $gp;
    function __construct()
    {
        $this->periodos = Periodo::get();
        $this->carreras = Carrera::get();
        $this->materias = Materia::get();
        //SELECTS
        if (request()->idperiodo) {
            $this->periodo_idG = request()->idperiodo;
            session(['periodo_idG' => request()->idperiodo]);
        } else {
            $this->periodo_idG = (session()->exists('periodo_idG') ? session('periodo_idG') : "-1");
        }

        if (request()->idcarrera) {
            $this->carrera_idG = request()->idcarrera;
            session(['carrera_idG' => request()->idcarrera]);
        } else {
            $this->carrera_idG = (session()->exists('carrera_idG') ? session('carrera_idG') : "-1");
        }

        $this->grupos = Grupo::get();

        //INPUTS
        if (request()->InNombre) {
            $this->InNombre = request()->InNombre;
            session(['InNombre' => request()->InNombre]);
        } else {
            $this->InNombre = session('InNombre', 'Nombre Grupo');
            session(['InNombre' => $this->InNombre]);
        }

        if (request()->InMaxA) {
            $this->InMaxA = request()->InMaxA;
            session(['InMaxA' => request()->InMaxA]);
        } else {
            $this->InMaxA = session('InMaxA', '0');
            session(['InMaxA' => $this->InMaxA]);
        }

        if (request()->InDes) {
            $this->InDes = request()->InDes;
            session(['InDes' => request()->InDes]);
        } else {
            $this->InDes = session('InDes', 'Descripcion Breve');
            session(['InDes' => $this->InDes]);
        }

        if (request()->InFecha) {
            $this->InFecha = request()->InFecha;
            session(['InFecha' => request()->InFecha]);
        } else {
            $this->InFecha = session('InFecha', 'dd/mm/aaaa');
            session(['InFecha' => $this->InFecha]);
        }

        $this->gp = Grupo::where('periodo_id', $this->periodo_idG )->where('grupo', $this->InNombre)->get();
    }

    public function index()
    {
        return view('grupos/index', ['periodos' => $this->periodos, 'carreras' => $this->carreras, 'materias' => $this->materias, 'gp' => $this->gp]);
    }

    public function hola()
    {
        return view('grupos/index2', ['periodos' => $this->periodos, 'carreras' => $this->carreras, 'materias' => $this->materias, 'gp' => $this->gp]);
    }

    public function create() {}


    public function store(Request $request)
    {
        if (request()->idperiodo and request()->idcarrera != '-1') {
            $existe = $this->grupos->where('grupo', $this->InNombre);
            if ($existe->count() == 0) {
                Grupo::create([
                    'grupo' => $this->InNombre,
                    'descripcion' => $this->InDes,
                    'maxAlumnos' => $this->InMaxA,
                    'periodo_id' => $this->periodo_idG
                ]);
                return redirect(route("grupoHorarios.index"));
            } else {
                return redirect(route("grupoHorarios.index"));
            }
        } else {
            return redirect()->back()->with('error', 'Necesitas llenar los campos necesarios.');
        }
    }

    public function show(Grupo $grupo) {}


    public function edit(Grupo $grupo) {}

    public function update(Request $request, Grupo $grupo) {}
    public function destroy(Grupo $grupo) {}
}
