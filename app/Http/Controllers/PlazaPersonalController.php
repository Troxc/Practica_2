<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Plaza;
use App\Models\PlazaPersonal;
use Illuminate\Http\Request;

class PlazaPersonalController extends Controller
{
    public $personalPlazas;
    public $val;

    public $personals;
    public $plazas;

    function __construct()
    {
        $this->personals = Personal::get();
        $this->plazas   = Plaza::get();
        if (request("txtBuscar")) {
            $txtBuscar = request("txtBuscar");
        } else {
            $txtBuscar = "";
        }

        $this->personalPlazas = PlazaPersonal::paginate(5);
        $this->val = [
            'tipoNombramiento'    => 'required',
            'plaza_id'          => 'required',
            'personal_id'       => 'required'
        ];
    }

    public function index(/*Request $request*/)
    {
    

        return view("personalPlazas/index", ['personalPlazas' => $this->personalPlazas]);  //, 'carrerasFiltro' => $carrerasFiltro, 'alumnoFiltro' => $alumnoFiltro]);
    }

    public function create()
    {
        return view('personalPlazas/frm', ['personalPlazas' => $this->personalPlazas, 'personals' => $this->personals, 'plazas' =>  $this->plazas, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        PlazaPersonal::create($validado);
        return redirect()->route("personalPlazas.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(PlazaPersonal $personalPlaza)
    {
        return view('personalPlazas/frm', ['personalPlazas' => $this->personalPlazas, "personalPlaza" => $personalPlaza, 'personals' => $this->personals, 'plazas' =>  $this->plazas, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(PlazaPersonal $personalPlaza)
    {
        return view('personalPlazas/frm', ['personalPlazas' => $this->personalPlazas, "personalPlaza" => $personalPlaza, 'personals' => $this->personals, 'plazas' =>  $this->plazas, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, PlazaPersonal $personalPlaza)
    {
        $validado = $request->validate($this->val);
        $personalPlaza->update($validado);
        return redirect()->route("personalPlazas.index");
    }

    public function destroy(PlazaPersonal $personalPlaza)
    {
        $personalPlaza->delete();
        return redirect()->route("personalPlazas.index");
    }
}