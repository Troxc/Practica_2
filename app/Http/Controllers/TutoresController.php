<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use App\Models\Personal;
use App\Models\Periodo;
use App\Models\Carrera;
use App\Models\Tutores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TutoresController extends Controller
{
    public $deptos, $personals, $periodos;       //VARIABLES GENERALES
    public $depto, $personal_id, $periodo_id;  //VARIABLES CAMBIANTES

    public function __construct()
    {
        // Manejo de sesión para departamento SOLO SE USA PARA FILTRO DE MAESTROS
        if (request()->depto) {
            $this->depto = request()->depto;
            session(['depto' => request()->depto]);
        } else {
            $this->depto = session('depto', '-1');
            session(['depto' => -1]); // AQUI SI NO HAT VALOR LO ASIGNO, los demas no hay problema aqui asi por la ocupo
        }

        // Manejo de sesión para personal SE USA PARA CAMPO NECESARIO EN REGISTRO
        if (request()->personal_id) {
            $this->personal_id = request()->personal_id;
            session(['personal_id' => request()->personal_id]);
        } else {
            $this->personal_id = session('personal_id', '-1');
        }

        // Manejo de sesión para periodo SE USA PARA CAMPO NECESARIO EN REGISTRO
        if (request()->periodo_id) {
            $this->periodo_id = request()->periodo_id;
            session(['periodo_id' => request()->periodo_id]);
        } else {
            $this->periodo_id = session('periodo_id', '-1');
        }

        // Cargar datos iniciales
        $this->deptos = Depto::all();

        if ($this->depto == -1) {
            $this->personals = [];
        } else {
            $this->personals = Personal::where('depto_id', $this->depto)->get();
        }
        $this->periodos = Periodo::all();
    }

    public function index()
    {
        return view('tutores.index', ['deptos' => $this->deptos, 'personals' => $this->personals, 'periodos' => $this->periodos]);
    }

    public function cancelar()
    {
        session()->forget(['periodo_id', 'depto', 'personal_id']);

        return redirect(route('tutorias'));
    }

    public function guardar()
    {
        $existeTutor = Tutores::where('personal_id', $this->personal_id)->where('periodos_id', $this->periodo_id)->exists();

        if ($existeTutor) {
            session()->flash('error', 'Este personal ya está asignado al mismo periodo. Pruebe en otro Periodo');
            return redirect()->back();
        }

        Tutores::create([
            'personal_id' => $this->personal_id,
            'periodos_id' => $this->periodo_id
        ]);

        $tutor = Tutores::where('personal_id', $this->personal_id)->where('periodos_id', $this->periodo_id)->first();

        session([
            'tutorId' => $tutor->id,
            'tutorPeriodo' => $tutor->periodos_id
        ]);
        session()->forget(['periodo_id', 'depto', 'personal_id']);

        return redirect()->route('tutorados.index');
    }
}
