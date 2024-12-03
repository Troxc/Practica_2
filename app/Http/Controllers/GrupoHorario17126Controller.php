<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Grupo17126;
use App\Models\GrupoHorario17126;
use App\Models\Lugar;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Personal;
use Illuminate\Http\Request;

class GrupoHorario17126Controller extends Controller
{
    public $grupoHorarios;
    public $val;

    public $grupos;
    public $lugars;

    function __construct()
    {
        $this->grupos = Grupo17126::get();
        $this->lugars   = Lugar::get();

        if (request("txtBuscar")) {
            $txtBuscar = request("txtBuscar");
        } else {
            $txtBuscar = "";
        }

        $this->grupoHorarios = GrupoHorario17126::paginate(5);
        $this->val = [
            'grupo17126_id'        => 'required',
            'lugar_id'       => 'required',
            'dia'        => 'required',
            'hora'        => 'required'
        ];
    }

    public function index()
    {
        return view("gruposHorarios17126/index17126", ['grupoHorarios' => $this->grupoHorarios]);
    }

    public function create()
    {
        return view('gruposHorarios17126/frm17126', ['grupoHorarios' => $this->grupoHorarios, 'grupos' => $this->grupos, 'lugars' =>  $this->lugars, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {   
        
        $validado = $request->validate($this->val);
        GrupoHorario17126::create($validado);
        $grupo17126 = Grupo17126::where('id', $request->grupo17126_id)->first();
        //return $grupo17126->id;
        $periodos  = Periodo::get();
        $materias = Materia::get();
        $personals = Personal::get();
        return view('grupos17126/frm17126', ['grupos' => $this->grupos, 'lugars' => $this->lugars, "grupo17126" => $grupo17126,'periodos' => $periodos, 'materias' => $materias, 'personals' =>  $personals, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
        //return redirect()->route("grupoHorario17126s.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(GrupoHorario17126 $grupoHorario17126)
    {
        return view('gruposHorarios17126/frm17126', ['grupoHorarios' => $this->grupoHorarios, 'grupoHorario17126' => $grupoHorario17126, 'grupos' => $this->grupos, 'lugars' =>  $this->lugars, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(GrupoHorario17126 $grupoHorario17126)
    {
        return view('gruposHorarios17126/frm17126', ['grupoHorarios' => $this->grupoHorarios, "grupoHorario17126" => $grupoHorario17126, 'grupos' => $this->grupos, 'lugars' =>  $this->lugars, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, GrupoHorario17126 $grupoHorario17126)
    {
        $validado = $request->validate($this->val);
        $grupoHorario17126->update($validado);
        return redirect()->route("grupoHorario17126s.index");
    }

    public function destroy(GrupoHorario17126 $grupoHorario17126)
    {
        $grupoHorario17126->delete();
        return redirect()->route("grupoHorario17126s.index");
    }
}
