<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use App\Models\Personal;
use App\Models\Puesto;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public $personals;
    public $val;
    public $deptos;
    public $puestos;
    function __construct()
    {
        $this->deptos = Depto::get();
        $this->puestos = Puesto::get();

        if (request("txtBuscar")) {
            $txtBuscar = request("txtBuscar");
        } else {
            $txtBuscar = "";
        }

        $this->personals = Personal::where("nombres", "like", "$txtBuscar%")->orderBy('id', 'asc' /*asc o desc*/)->paginate(5);
        $this->val = [
            'RFC' => 'required',
            'nombres'    => ['required', 'min:3', 'max:50'],
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'fechaIngSep' => 'required',
            'fechaIngIns' => 'required',
            'depto_id' => 'required',
            'puesto_id'=> 'required'
        ];
    }

    public function index(/*Request $request*/)
    {
        

        return view("personals/index", ['personals' => $this->personals]);  //, 'carrerasFiltro' => $carrerasFiltro, 'alumnoFiltro' => $alumnoFiltro]);
    }

    public function create()
    {
        return view('personals/frm', ['personals' => $this->personals, 'deptos' => $this->deptos, 'puestos' => $this->puestos, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Personal::create($validado);
        return redirect()->route("personals.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Personal $personal)
    {
        return view('personals/frm', ['personals' => $this->personals, "personal" => $personal, 'deptos' => $this->deptos, 'puestos' => $this->puestos, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Personal $personal)
    {
        return view('personals/frm', ['personals' => $this->personals, "personal" => $personal, 'deptos' => $this->deptos, 'puestos' => $this->puestos, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Personal $personal)
    {
        $validado = $request->validate($this->val);
        $personal->update($validado);
        return redirect()->route("personals.index");
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect()->route("personals.index");
    }
}