<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public $carreras;
    public $deptos;
    public $val;
    function __construct()
    {
        $this->carreras = Carrera::paginate(5);
        $this->deptos   = Depto::get();
        $this->val = [
            'idCarrera'    => 'required',
            'nombreCarrera'    => 'required',
            'nombreMediano' => 'required',
            'nombreCorto' => 'required',
            'depto_id'       =>'required'
        ];
    }

    public function index()
    {
        return view("carreras/index", ['carreras' => $this->carreras]);
    }

    public function create()
    {
        return view('carreras/frm', ['carreras' => $this->carreras, 'deptos' => $this->deptos, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Carrera::create($validado);
        return redirect()->route("carreras.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Carrera $carrera)
    {
        return view('carreras/frm', ['carreras' => $this->carreras, "carrera" => $carrera, 'deptos' => $this->deptos, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Carrera $carrera)
    {
        return view('carreras/frm', ['carreras' => $this->carreras, "carrera" => $carrera, 'deptos' => $this->deptos, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Carrera $carrera)
    {
        $validado = $request->validate($this->val);
        $carrera->update($validado);
        return redirect()->route("carreras.index");
    }

    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route("carreras.index");
    }
}
