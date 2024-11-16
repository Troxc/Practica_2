<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;

class EdificioController extends Controller
{

    public $edificios;
    public $val;
    function __construct()
    {
        if (request("txtBuscar")) {
            $txtBuscar = request("txtBuscar");
        } else {
            $txtBuscar = "";
        }

        $this->edificios = Edificio::where("nombreEdificio", "like", "$txtBuscar%")->orderBy('id', 'asc' /*asc o desc*/)->paginate(5);
        $this->val = [
            'nombreEdificio'    => ['required', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'nombreCorto' => 'required'
        ];
    }

    public function index(/*Request $request*/)
    {
    

        return view("edificios/index", ['edificios' => $this->edificios]);  //, 'carrerasFiltro' => $carrerasFiltro, 'alumnoFiltro' => $alumnoFiltro]);
    }

    public function create()
    {
        return view('edificios/frm', ['edificios' => $this->edificios, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Edificio::create($validado);
        return redirect()->route("edificios.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Edificio $edificio)
    {
        return view('edificios/frm', ['edificios' => $this->edificios, "edificio" => $edificio, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Edificio $edificio)
    {
        return view('edificios/frm', ['edificios' => $this->edificios, "edificio" => $edificio, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Edificio $edificio)
    {
        $validado = $request->validate($this->val);
        $edificio->update($validado);
        return redirect()->route("edificios.index");
    }

    public function destroy(Edificio $edificio)
    {
        $edificio->delete();
        return redirect()->route("edificios.index");
    }
}
