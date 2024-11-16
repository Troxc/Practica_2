<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public $lugars;
    public $val;
 
    public $edificios;

    function __construct()
    {
        $this->edificios = Edificio::get();

        if (request("txtBuscar")) {
            $txtBuscar = request("txtBuscar");
        } else {
            $txtBuscar = "";
        }

        $this->lugars = Lugar::where("nombreLugar", "like", "$txtBuscar%")->orderBy('id', 'asc' /*asc o desc*/)->paginate(5);
        $this->val = [
            'nombreLugar'    => ['required', 'min:3', 'max:50'],
            'nombreCorto' => 'required',
            'edificio_id'   => 'required'
        ];
    }

    public function index()
    {
    

        return view("lugares/index", ['lugars' => $this->lugars]);  //, 'carrerasFiltro' => $carrerasFiltro, 'alumnoFiltro' => $alumnoFiltro]);
    }

    public function create()
    {
        return view('lugares/frm', ['lugars' => $this->lugars, 'edificios' => $this->edificios, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Lugar::create($validado);
        return redirect()->route("lugares.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Lugar $lugar)
    {
        return view('lugares/frm', ['lugars' => $this->lugars, "lugar" => $lugar, 'edificios' => $this->edificios, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Lugar $lugar)
    {
        return view('lugares/frm', ['lugars' => $this->lugars, "lugar" => $lugar, 'edificios' => $this->edificios, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Lugar $lugar)
    {
        $validado = $request->validate($this->val);
        $lugar->update($validado);
        return redirect()->route("lugares.index");
    }

    public function destroy(Lugar $lugar)
    {
        $lugar->delete();
        return redirect()->route("lugares.index");
    }
}
