<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Periodo;
use Illuminate\Http\Request;
use App\Models\MateriasAbiertas;



class MateriasAbiertasController extends Controller
{

    public $carrera;
    public $ma;
    public $periodo_id;
    public $carrera_id;


    public $idTexto;

    function __construct()
    {
        // Pruebas de texto input
        if (request()->idTexto) {
            $this->idTexto = request()->idTexto;
            session(['idTexto' => request()->idTexto]);
        } else {
            $this->idTexto = session('idTexto', 'IngreAAAA'); // Establecer valor predeterminado
            session(['idTexto' => $this->idTexto]); // Almacenar en la sesión
        }


        if (request()->idperiodo) {
            $this->periodo_id = request()->idperiodo;
            session(['periodo_id' => request()->idperiodo]);
        } else {
            $this->periodo_id = (session()->exists('periodo_id') ? session('periodo_id') : "-1");
        }

        if (request()->idcarrera) {
            $this->carrera_id = request()->idcarrera;
            session(['carrera_id' => request()->idcarrera]);
        } else {
            $this->carrera_id = (session()->exists('carrera_id') ? session('carrera_id') : "-1");
        }

        $this->carrera = Carrera::with("reticulas.materias")->where('id', $this->carrera_id)->get();

        $this->ma = MateriasAbiertas::where('periodo_id', $this->periodo_id)
            ->where('carrera_id', $this->carrera_id) 
            ->get();
    }

    public function index()
    {
        // return request()->all();
        $periodos = Periodo::get();
        $carreras = Carrera::get();
        return view(
            "materiasa/index",
            [
                'periodos' => $periodos,
                'carreras' => $carreras,
                'carrera' => $this->carrera,
                'ma' => $this->ma
            ]
        );
    }

    public function vacio()
    {
        session()->forget(['periodo_id', 'carrera_id', 'idTexto']);

        return redirect()->route('horarios');
    }

    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 1) == 'm') {
                $existe = $this->ma->firstWhere('materia_id', $request->$key);
                if (is_null($existe)) {
                    MateriasAbiertas::create([
                        'periodo_id' => $this->periodo_id,
                        'carrera_id' => $this->carrera_id,
                        'materia_id' => $value
                    ]);
                }
            }

            //return request()->eliminar; 
            if (request()->eliminar and request()->eliminar != "NOELIMINAR") {
                //return "entro";
                $existe = MateriasAbiertas::where('materia_id', $request->eliminar)
                    ->where('periodo_id', $this->periodo_id)
                    ->delete();
                return redirect()->route('materiasa.index');
            }
        }
        return redirect()->route('materiasa.index');
    }
}
