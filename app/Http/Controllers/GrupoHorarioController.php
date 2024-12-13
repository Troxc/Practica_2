<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto;
use App\Models\Edificio;
use App\Models\Grupo;
use App\Models\GrupoHorario;
use App\Models\Materia;
use App\Models\Periodo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GrupoHorarioController extends Controller
{

    public $gp, $gp1, $paraselect;
    function __construct()
    {
        if (request()->has('depto')) {
            session(['deptoPruebas' => request()->depto]);
        }

        if (request()->has('semestre')) {
            session(['semestrePruebas' => request()->semestre]);
        }

        if (request()->has('edificio')) {
            session(['edificioPruebas' => request()->edificio]);
        }

        $this->gp = Grupo::where('periodo_id', session('periodo_idG'))->where('grupo', session('InNombre'))->get();
        $this->gp1 = Grupo::where('periodo_id', session('periodo_idG'))->where('grupo', session('InNombre'))->first();

        $this->paraselect = GrupoHorario::where('grupo_id',session('grupoId1'))->where('lugar_id',session('lugarId1'))->get();
    
    }

    public function index(Request $request)
    {
        $periodos = Periodo::get();
        $carreras = Carrera::get();
        $deptos   = Depto::get();
        $edificios = Edificio::get();
        $carrera        = Carrera::find(session("carrera_idG"));

        $gp2 = Grupo::where('periodo_id', session('periodo_idG'))->where('grupo', session('InNombre'))->first();
        $existeGH = GrupoHorario::where('grupo_id', $gp2->id)->exists();

        
        if ($existeGH) {
            $gH = GrupoHorario::where('grupo_id', $gp2->id)->get();
        } else {
            $gH = collect([]);
        }

        if ($request->depto && $request->depto != -1) {
            $depto = Depto::find($request->depto);
        } else {
            $depto = Depto::find(1);
        }
        $personal = $depto->personals;

        if ($request->edificio && $request->edificio != -1) {
            $edificio = Edificio::find($request->edificio);
        } else {
            $edificio = Edificio::find(1);
        }

        $lugares = $edificio->lugars;
        $personal = $depto->personals;

        $materias = $carrera->reticulas->flatMap(function ($reticula) {
            return $reticula->materias;
        });

        return view('grupos/index2', ['paraselect' => $this->paraselect, 'gH' => $gH, 'lugares' => $lugares, 'edificios' => $edificios, 'personal' => $personal, 'deptos' => $deptos, 'periodos' => $periodos, 'carreras' => $carreras, 'materias' => $materias, 'gp' => $this->gp]);
    }

    public function store(Request $request)
    {

        $grupo = Grupo::where("grupo", session("InNombre"))->first();


        if ($request->materia) {
            $grupo->materia_id = $request->materia;
            $grupo->save();

            return back();
        } elseif ($request->persona) {
            $grupo->personal_id = $request->persona;
            $grupo->save();

            return back();
        }
    }

    public function apoyo(Request $request)
    {       
        $dia = substr($request->last_selected, 0, 1); 
        $hora = substr($request->last_selected, 1); 
        $horaFormatted = Carbon::createFromTime((int)$hora, 0, 0)->format('H:i:s');
        GrupoHorario::create([
        'grupo_id' => $this->gp1->id,
        'lugar_id' => $request->lugar,
        'dia' => $dia,
        'hora' => $horaFormatted,
    ]);
    session(['grupoId1' => $this->gp1->id]);
    session(['lugarId1' => $request->lugar]);

        $this->paraselect = GrupoHorario::where('grupo_id',$this->gp1->id)->where('lugar_id',$request->lugar)->get();
        return redirect()->route('grupoHorarios.index');
    }

    public function agregarHora(Request $request) {}

    public function vaciarS() {
        $sessionKeys = ['grupoId1', 'lugarId1'];

        foreach ($sessionKeys as $key) {
            session()->forget($key);
        }
        return redirect()->route('grupos.index');
    }
}
