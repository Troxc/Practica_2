<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Grupo17126;
use App\Models\GrupoHorario17126;
use App\Models\Lugar;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Personal;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Monolog\Handler\SendGridHandler;

class Grupo17126Controller extends Controller
{
    public $grupos;
    public $val;

    public $materias;
    public $personals;
    public $periodos;

    function __construct()
    {
        $this->materias = Materia::get();
        $this->personals   = Personal::get();
        $this->periodos   = Periodo::get();

        if (request("txtBuscar")) {
            $txtBuscar = request("txtBuscar");
        } else {
            $txtBuscar = "";
        }

        $this->grupos = Grupo17126::paginate(5);
        $this->val = [
            'grupo'             => 'required',
            'descripcion'       => 'required',
            'maxAlumnos'        => 'required',
            'materia_id'        => 'required',
            'periodo_id'        => 'required',
            'personal_id'       => 'required'
        ];
    }

    public function index()
    {
        return view("grupos17126/index17126", ['grupos' => $this->grupos]);
    }

    public function create()
    {
        return view('grupos17126/frm17126', ['grupos' => $this->grupos, 'periodos' => $this->periodos, 'materias' => $this->materias, 'personals' =>  $this->personals, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Grupo17126::create($validado);

        $lugars = Lugar::get();
        $grupos = Grupo17126::get();
        $grupo17126 = Grupo17126::where('grupo', $request->grupo)->first();
        //return $grupo17126->id;
        return view('grupos17126/frm17126', ['grupos' => $grupos, 'lugars' => $lugars, "grupo17126" => $grupo17126,'periodos' => $this->periodos, 'materias' => $this->materias, 'personals' =>  $this->personals, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
        
        //return redirect()->route("grupo17126s.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Grupo17126 $grupo17126)
    {
        return view('grupos17126/frm17126', ['grupos' => $this->grupos, 'grupo17126' => $grupo17126, 'periodos' => $this->periodos, 'materias' => $this->materias, 'personals' =>  $this->personals, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Grupo17126 $grupo17126)
    {
        $lugars = Lugar::get();

        return view('grupos17126/frm17126', ['grupos' => $this->grupos, 'lugars' => $lugars, "grupo17126" => $grupo17126,'periodos' => $this->periodos, 'materias' => $this->materias, 'personals' =>  $this->personals, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Grupo17126 $grupo17126)
    {
        $validado = $request->validate($this->val);
        $grupo17126->update($validado);
        

        $lugars = Lugar::get();
        $grupo17126 = Grupo17126::where('grupo', $request->grupo)->first();

        return view('grupos17126/frm17126', ['grupos' => $this->grupos, 'lugars' => $lugars,  "grupo17126" => $grupo17126,'periodos' => $this->periodos, 'materias' => $this->materias, 'personals' =>  $this->personals, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
        
        return redirect()->route("grupo17126s.index");
    }

    public function destroy(Grupo17126 $grupo17126)
    {
        $grupo17126->delete();
        return redirect()->route("grupo17126s.index");
    }
}
