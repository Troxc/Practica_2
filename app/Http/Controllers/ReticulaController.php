<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Reticula;
use Illuminate\Http\Request;

class ReticulaController extends Controller
{
 
    public $reticulas;
    public $carreras;
    public $val;
    function __construct()
    {
        $this->reticulas = Reticula::paginate(5);
        $this->carreras   = Carrera::get();
        $this->val = [
            'descripcion'    => 'required',
            'fechaVigor' => 'required',
            'carrera_id'=>  'required'
        ];
    }

    public function index()
    {
        return view("reticulas/index", ['reticulas' => $this->reticulas]);
    }

    public function create()
    {
        return view('reticulas/frm', ['reticulas' => $this->reticulas, 'carreras' => $this->carreras, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Reticula::create($validado);
        return redirect()->route("reticulas.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Reticula $reticula)
    {
        return view('reticulas/frm', ['reticulas' => $this->reticulas, "reticula" => $reticula, 'carreras' => $this->carreras, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Reticula $reticula)
    {
        return view('reticulas/frm', ['reticulas' => $this->reticulas, "reticula" => $reticula, 'carreras' => $this->carreras, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Reticula $reticula)
    {
        $validado = $request->validate($this->val);
        $reticula->update($validado);
        return redirect()->route("reticulas.index");
    }

    public function destroy(Reticula $reticula)
    {
        $reticula->delete();
        return redirect()->route("reticulas.index");
    }
}
