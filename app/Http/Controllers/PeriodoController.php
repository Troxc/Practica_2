<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public $periodos;
    public $val;
    function __construct()
    {
        $this->periodos = Periodo::paginate(5);
        $this->val = [
            'periodo'    => 'required',
            'descCorta'      => 'required',
            'fechaIni'      => 'required',
            'fechaFin'      => 'required'
        ];
    }

    public function index()
    {
        return view("periodos/index", ['periodos' => $this->periodos]);
    }

    public function create()
    {
        return view('periodos/frm', ['periodos' => $this->periodos, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Periodo::create($validado);
        return redirect()->route("periodos.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Periodo $periodo)
    {
        return view('periodos/frm', ['periodos' => $this->periodos, "periodo" => $periodo, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Periodo $periodo)
    {
        return view('periodos/frm', ['periodos' => $this->periodos, "periodo" => $periodo, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Periodo $periodo)
    {
        $validado = $request->validate($this->val);
        $periodo->update($validado);
        return redirect()->route("periodos.index");
    }

    public function destroy(Periodo $periodo)
    {
        $periodo->delete();
        return redirect()->route("periodos.index");
    }
}
