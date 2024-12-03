<?php

namespace App\Http\Controllers;

use App\Models\FechaSeguimiento;
use App\Models\Periodo;
use Illuminate\Http\Request;

class FechaSeguimientoController extends Controller
{
    public $seguimientos;
    public $val;
    public $periodos;
    function __construct()
    {
        $this->seguimientos = FechaSeguimiento::orderBy('periodo_id', 'desc')->orderBy('fechaIni')->paginate(5);
        $this->periodos = Periodo::get();
        $this->val = [
            'desc'          => 'required',
            'fechaIni'      => 'required',
            'fechaFin'      => 'required',
            'periodo_id'    => 'required'
        ];
    }

    public function index()
    {
        return view("seguimientos/index", ['seguimientos' => $this->seguimientos]);
    }

    public function create()
    {
        return view('seguimientos/frm', ['periodos' => $this->periodos, 'seguimientos' => $this->seguimientos, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        FechaSeguimiento::create($validado);
        return redirect()->route("seguimientos.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(FechaSeguimiento $seguimiento)
    {
        return view('seguimientos/frm', ['periodos' => $this->periodos, 'seguimientos' => $this->seguimientos, "seguimiento" => $seguimiento, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(FechaSeguimiento $seguimiento)
    {
        return view('seguimientos/frm', ['periodos' => $this->periodos, 'seguimientos' => $this->seguimientos, "seguimiento" => $seguimiento, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, FechaSeguimiento $seguimiento)
    {
        $validado = $request->validate($this->val);
        $seguimiento->update($validado);
        return redirect()->route("seguimientos.index");
    }

    public function destroy(FechaSeguimiento $seguimiento)
    {
        $seguimiento->delete();
        return redirect()->route("seguimientos.index");
    }
}
