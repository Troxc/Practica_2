<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public $puestos;
    public $val;
    function __construct()
    {
        $this->puestos = Puesto::paginate(5);
        $this->val = [
            'idPuesto'  => 'required',
            'nombre'    => 'required',
            'tipo'      => 'required'
        ];
    }

    public function index()
    {
        // $puestos = DB::table('puestos')->get();

        return view("puestos/index", ['puestos' => $this->puestos]);
    }

    public function create()
    {
        //otra forma
        //$puestos = Puesto::get();
        return view('puestos/frm', ['puestos' => $this->puestos, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Puesto::create($validado);
        return redirect()->route("puestos.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Puesto $puesto)
    {
        return view('puestos/frm', ['puestos' => $this->puestos, "puesto" => $puesto, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Puesto $puesto)
    {
        return view('puestos/frm', ['puestos' => $this->puestos, "puesto" => $puesto, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Puesto $puesto)
    {
        $validado = $request->validate($this->val);
        $puesto->update($validado);
        return redirect()->route("puestos.index");
    }

    public function destroy(Puesto $puesto)
    {
        $puesto->delete();
        return redirect()->route("puestos.index");
    }
}
