<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Reticula;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public $materias;
    public $reticulas;
    public $val;

    function __construct()
    {
        $this->materias = Materia::paginate(5);
        $this->reticulas = Reticula::get();
        $this->val = [
            'nombreMateria'  => 'required',
            'nivel'          => 'required',
            'nombreMediano'  => 'required',
            'nombreCorto'    => 'required',
            'modalidad'      => 'required',
            'reticula_id'    => 'required|exists:reticulas,id',
        ];
    }

    public function index()
    {
        return view("materias/index", ['materias' => $this->materias]);
    }

    public function create()
    {
        return view('materias/frm', [
            'materias' => $this->materias,
            'reticulas' => $this->reticulas,
            'accion' => 'C',
            'des' => '',
            'btn' => 'INSERTAR',
            'color' => 'btn-success'
        ]);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Materia::create($validado);
        return redirect()->route("materias.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Materia $materia)
    {
        return view('materias/frm', [
            'materias' => $this->materias,
            'materia' => $materia,
            'reticulas' => $this->reticulas,
            'accion' => 'S',
            'des' => 'disabled',
            'btn' => 'ELIMINAR',
            'color' => 'btn-danger'
        ]);
    }

    public function edit(Materia $materia)
    {
        return view('materias/frm', [
            'materias' => $this->materias,
            'materia' => $materia,
            'reticulas' => $this->reticulas,
            'accion' => 'E',
            'des' => '',
            'btn' => 'EDITAR',
            'color' => 'btn-warning'
        ]);
    }

    public function update(Request $request, Materia $materia)
    {
        $validado = $request->validate($this->val);
        $materia->update($validado);
        return redirect()->route("materias.index");
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route("materias.index");
    }
}
