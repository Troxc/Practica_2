<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class PlazaController extends Controller
{
    public $plazas;
    public $val;
    function __construct()
    {
        $this->plazas = Plaza::paginate(5);
        $this->val = [
            'idPlaza'       => 'required',
            'nombrePlaza'   => 'required',
            'archivo'       => 'file|mimes:pdf|max:2048'
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

        // Manejar el archivo cargado
        if ($request->hasFile('archivo')) {
            // Obtener el contenido del archivo
            $archivo = $request->file('archivo');
            $contenidoArchivo = base64_encode(file_get_contents($archivo->getRealPath()));
            // Almacenar el contenido del archivo directamente en la base de datos
            $validado['archivo'] = $contenidoArchivo;
        }

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
    
        // Manejar el archivo cargado (opcional)
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $contenidoArchivo = base64_encode(file_get_contents($archivo->getRealPath()));
            $validado['archivo'] = $contenidoArchivo;
        } else {
            // Si no se carga un nuevo archivo, mantener el archivo existente
            unset($validado['archivo']);
        }
    
        // Actualizar la plaza
        $plaza->update($validado);
    
        return redirect()->route("plazas.index")->with('mensaje', 'El registro se actualizó correctamente');
    }
    

    public function destroy(Plaza $plaza)
    {
        $plaza->delete();
        return redirect()->route("plazas.index");
    }

    public function showFile(Plaza $plaza)
    {

            $archivoBinario = base64_decode($plaza->archivo);

            return response($archivoBinario)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="'.$plaza->idPlaza.'.pdf"');
    }

    public function generarWord(Plaza $plaza)
    {
     
        // Ruta de una plantilla Word (si usas una)
        $templatePath = storage_path('app/templates/pr2.docx');
        $outputPath = storage_path('app/public/'.$plaza->idPlaza.'.docx');

        // Cargar la plantilla Word
        $templateProcessor = new TemplateProcessor($templatePath);

        // Rellenar los campos dinámicos
        $templateProcessor->setValue('nombrePlaza', $plaza->nombrePlaza);
        $templateProcessor->setValue('idPlaza', $plaza->idPlaza);

        // Guardar el archivo generado
        $templateProcessor->saveAs($outputPath);

        // Descargar el archivo generado
        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}
