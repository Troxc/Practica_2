<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use Illuminate\Http\Request;

class PlazaController extends Controller
{
    public $plazas;
    public $val;
    function __construct()
    {
        $this->plazas = Plaza::paginate(5);
        $this->val = [
            'idPlaza'       => 'required',
            'nombrePlaza'   => 'required'
        ];
    }

    public function index()
    {
        // $plazas = DB::table('plazas')->get();

        return view("plazas/index", ['plazas' => $this->plazas]);
    }

    public function create()
    {
        //otra forma
        //$plazas = Plaza::get();
        return view('plazas/frm', ['plazas' => $this->plazas, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Plaza::create($validado);
        return redirect()->route("plazas.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Plaza $plaza)
    {
        return view('plazas/frm', ['plazas' => $this->plazas, "plaza" => $plaza, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Plaza $plaza)
    {
        return view('plazas/frm', ['plazas' => $this->plazas, "plaza" => $plaza, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Plaza $plaza)
    {
        $validado = $request->validate($this->val);
        $plaza->update($validado);
        return redirect()->route("plazas.index");
    }

    public function destroy(Plaza $plaza)
    {
        $plaza->delete();
        return redirect()->route("plazas.index");
    }
}
