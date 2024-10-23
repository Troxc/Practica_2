<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use Illuminate\Http\Request;

class DeptoController extends Controller
{
    public $deptos;
    public $val;
    function __construct()
    {
        $this->deptos = Depto::paginate(5);
        $this->val = [
            'idDepto'    => 'required',
            'nombreDepto'    => 'required',
            'nombreMediano' => 'required',
            'nombreCorto' => 'required'
        ];
    }

    public function index()
    {
        return view("deptos/index", ['deptos' => $this->deptos]);
    }

    public function create()
    {
        return view('deptos/frm', ['deptos' => $this->deptos, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Depto::create($validado);
        return redirect()->route("deptos.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Depto $depto)
    {
        return view('deptos/frm', ['deptos' => $this->deptos, "depto" => $depto, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Depto $depto)
    {
        return view('deptos/frm', ['deptos' => $this->deptos, "depto" => $depto, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Depto $depto)
    {
        $validado = $request->validate($this->val);
        $depto->update($validado);
        return redirect()->route("deptos.index");
    }

    public function destroy(Depto $depto)
    {
        $depto->delete();
        return redirect()->route("deptos.index");
    }
}
