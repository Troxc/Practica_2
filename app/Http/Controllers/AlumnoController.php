<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{

    public $alumnos;
    public $carreras;
    public $val;
    function __construct()
    {
        $this->alumnos = Alumno::paginate(5);
        $this->carreras   = Carrera::get();
        $this->val = [
            'noctrl'    => 'required',
            'nombre'    => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'sexo'      => 'required',
            'carrera_id'=>  'required'
        ];
    }

    public function index()
    {
        // $alumnos = DB::table('alumnos')->get();

        return view("alumnosV2/index", ['alumnos' => $this->alumnos]);
    }

    public function create()
    {
        //otra forma
        //$alumnos = Alumno::get();
        return view('alumnosV2/frm', ['alumnos' => $this->alumnos, 'carreras' => $this->carreras, 'accion' => 'C', 'des' => '', 'btn' => 'INSERTAR', 'color' => 'btn-success']);
    }

    public function store(Request $request)
    {
        $validado = $request->validate($this->val);
        Alumno::create($validado);
        return redirect()->route("alumnos.index")->with('mensaje', 'El registro se inserto correctamente');
    }

    public function show(Alumno $alumno)
    {
        return view('alumnosV2/frm', ['alumnos' => $this->alumnos, "alumno" => $alumno, 'carreras' => $this->carreras, 'accion' => 'S', 'des' => 'disabled', 'btn' => 'ELIMINAR', 'color' => 'btn-danger']);
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnosV2/frm', ['alumnos' => $this->alumnos, "alumno" => $alumno, 'carreras' => $this->carreras, 'accion' => 'E', 'des' => '', 'btn' => 'EDITAR', 'color' => 'btn-warning']);
    }

    public function update(Request $request, Alumno $alumno)
    {
        $validado = $request->validate($this->val);
        $alumno->update($validado);
        return redirect()->route("alumnos.index");
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route("alumnos.index");
    }
}
