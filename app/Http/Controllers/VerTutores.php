<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\alumnoGrupo;
use App\Models\FechaSeguimiento;
use App\Models\Grupo17126;
use App\Models\Periodo;
use App\Models\Tutorado;
use App\Models\Tutores;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

use function Ramsey\Uuid\v1;

class VerTutores extends Controller
{

    public function index(Request $request)
    {

        $selectedPeriodo = $request->periodo;

        if ($request->periodo) {
            $tutores = Tutores::where('periodos_id', $request->periodo)->paginate(10);
        } else {
            $tutores = Tutores::orderBy('created_at', 'desc')->paginate(10);
        }




        $periodos = Periodo::all(); // Obtén todos los períodos

        return view('tutoresLista.index', [
            'tutores' => $tutores,
            'periodos' => $periodos,
            'selectedPeriodo' => $selectedPeriodo,
        ]);
    }

    public function verAlumnado(Tutores $tutor)
    {
        $tutorados = Tutorado::where('tutores_id', $tutor->id)->paginate(10);


        return view('tutoresLista.index2', ['tutor' => $tutor, 'tutorados' => $tutorados]);
    }

    public function generarReporte(Tutorado $tutorado, $campo)
    {
        $tutor      = Tutores::where('id', $tutorado->tutores_id)->first();
        $periodo    = Periodo::where('id', $tutor->periodos_id)->first();
        $seguimiento = FechaSeguimiento::where('periodo_id', $periodo->id)->where('desc', $campo)->first();
        $alumno     = Alumno::where('id', $tutorado->alumno_id)->first();
        $grupos = alumnoGrupo::where('alumno_id', $alumno->id)->pluck('grupo17126_id');
        $materias = Grupo17126::whereIn('id', $grupos)  // Filtrar solo los grupos a los que pertenece el alumno
            ->where('periodo_id', $periodo->id)  // Filtrar por el periodo
            ->get();

            
        $fechaFormateada = \Carbon\Carbon::parse($seguimiento->fechaIni)->format('j \d\e F \d\e Y');

        // Ruta de la plantilla y archivo de salida
        $templatePath = storage_path('app/templates/formatoSeguimiento.docx');
        $outputPath = storage_path('app/public/Alumno' . $alumno->noctrl .' '. $seguimiento->desc .'.docx');

        // Cargar la plantilla Word
        $templateProcessor = new TemplateProcessor($templatePath);

        // Rellenar los campos estáticos
        $templateProcessor->setValue('carrera', $alumno->carrera->nombreCarrera);
        $templateProcessor->setValue('fechaSeguimiento', $fechaFormateada);
        $templateProcessor->setValue('nombreAlumno', $alumno->nombre.' '.$alumno->apellidoP. ' '. $alumno->apellidoM);
        $templateProcessor->setValue('numControl', $alumno->noctrl);
        $templateProcessor->setValue('nombreProfe', $tutor->personal->nombres.' '.$tutor->personal->apellidoP.' '.$tutor->personal->apellidoM);
        $templateProcessor->setValue('nombreProfeC', $tutor->personal->nombres.' '.$tutor->personal->apellidoP);


        $templateProcessor->cloneRow('n', $materias->count()); // Clonamos una fila para cada tutorado

        $rowIndex = 1;
        foreach ($materias as $materia) {

            $templateProcessor->setValue('n#' . $rowIndex, $rowIndex);
            $templateProcessor->setValue('materia#' . $rowIndex, $materia->materia->nombreMateria);
            $templateProcessor->setValue('profe#' . $rowIndex, $materia->personal->nombres.' '.$materia->personal->apellidoP);
            $rowIndex++;
        }



        // Guardar el archivo generado
        $templateProcessor->saveAs($outputPath);

        // Descargar el archivo generado
        return response()->download($outputPath)->deleteFileAfterSend(true);
    }


    public function verFormulario(Tutorado $tutorado, $campo)
    {

        return view('tutoresLista.form', ['tutorado' => $tutorado, 'campo' => $campo]);
    }


    public function guardarArchivo(Request $request, Tutorado $tutorado, $campo)
    {

        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
    
     
            $contenidoArchivo = base64_encode(file_get_contents($archivo->getRealPath()));
    
  
            $registroTutorado = Tutorado::findOrFail($tutorado->id);
 
            $registroTutorado->$campo = $contenidoArchivo;

            $registroTutorado->save();

            return redirect()->route('verturores.verAlumnado', $tutorado->tutores_id) ;
        }
    
        
    }
    

    public function verDocumento(Tutorado $tutorado, $campo)
    {
        $archivoBinario = base64_decode($tutorado->$campo);

        return response($archivoBinario)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="'.'.pdf"');
    }
}
