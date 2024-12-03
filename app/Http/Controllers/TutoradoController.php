<?php

namespace App\Http\Controllers;

use App\Models\alumnoGrupo;
use App\Models\Carrera;
use App\Models\FechaSeguimiento;
use App\Models\Periodo;
use App\Models\Tutorado;
use App\Models\Tutores;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\Return_;

class TutoradoController extends Controller
{
    public $alumnos, $carreras, $alumnoTutor;
    public $alumno, $tutores, $ver;
    function __construct()
    {
        
        if (request()->alumno) {
            $this->alumno = request()->alumno;
            session(['alumno' => request()->alumno]);
        } else {
            $this->alumno = session('alumno', '-1'); // Establecer valor predeterminado
            session(['alumno' => $this->alumno]); // Almacenar en la sesión
        }

        $tutorPeriodo = session('tutorPeriodo');
        $this->alumnos = AlumnoGrupo::with('alumno')
            ->whereHas('grupo17126', function ($query) use ($tutorPeriodo) {
                $query->where('periodo_id', $tutorPeriodo);
            })
            ->select('alumno_id') // Seleccionar solo los IDs de alumnos
            ->distinct() // Eliminar duplicados
            ->get()
            ->map(function ($alumnoGrupo) {
                return $alumnoGrupo->alumno; // Devolver solo el modelo Alumno
            });


        $tutor = session('tutorId');
        $this->alumnoTutor = Tutorado::where('tutores_id', $tutor)->get();
    }

    public function index()
    {

        return view('tutores.tutoriados', [
            'alumnos' => $this->alumnos,
            'alumnoTutor' => $this->alumnoTutor
        ]);
    }

    public function store(Request $request)
    {

        $tutor = session('tutorId');


        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 1) == 'm') {
                $tutoradoExistente =  $this->alumnoTutor->firstWhere('alumno_id', $request->$key);
                if (is_null($tutoradoExistente)) {
                    Tutorado::create([
                        'tutores_id' => $tutor,
                        'alumno_id' => $value,
                    ]);
                }
            }
        }

        if (request()->eliminar != "NOELIMINAR") {
            //return "entro";
            $tutoradoExistente = Tutorado::where('tutores_id', $tutor)->where('alumno_id', $request->eliminar)->delete();
            return redirect()->route('tutorados.index');
        }


        return redirect()->route('tutorados.index');
    }

    public function generarReporte() {
        $tutor = Tutores::where('id', session('tutorId'))->first();
        $tutorados = Tutorado::where('tutores_id', $tutor->id)->get();
        $femeninos = $tutorados->filter(function ($tutorado) {
            return $tutorado->alumno->sexo === 'F';
        })->count();
        $masculinos = $tutorados->filter(function ($tutorado) {
            return $tutorado->alumno->sexo === 'M';
        })->count();
        $seguimientos = FechaSeguimiento::where('periodo_id', $tutor->periodos->id)->get();
    
        // Ruta de la plantilla y archivo de salida
        $templatePath = storage_path('app/templates/listaTutores.docx');
        $outputPath = storage_path('app/public/Lista_de_Alumnos_' . $tutor->personal->nombres . '_' . $tutor->personal->apellidoP . '.docx');
    
        // Cargar la plantilla Word
        $fechaFormateada = \Carbon\Carbon::parse($seguimientos[0]->fechaIni)->format('j \d\e F \d\e Y');
        $fechaFormateada1 = \Carbon\Carbon::parse($seguimientos[0]->fechaFin)->format('j \d\e F \d\e Y');

        $templateProcessor = new TemplateProcessor($templatePath);
    
        // Rellenar los campos estáticos
        $templateProcessor->setValue('tutor', $tutor->personal->nombres . ' ' . $tutor->personal->apellidoP . ' ' . $tutor->personal->apellidoM);
        $templateProcessor->setValue('tipo', strtoupper($tutor->personal->puesto->tipo));
        $templateProcessor->setValue('totalAlumnos', $tutorados->count());
        $templateProcessor->setValue('depto', strtoupper($tutor->personal->depto->nombreDepto));
        $templateProcessor->setValue('mujeres', $femeninos);
        $templateProcessor->setValue('hombres', $masculinos);
        $templateProcessor->setValue('periodo', $tutor->periodos->periodo);
        $templateProcessor->setValue('seg1', $fechaFormateada . ' al ' . $fechaFormateada1);
        $templateProcessor->setValue('seg2', $seguimientos[1]->fechaIni . ' al ' . $seguimientos[1]->fechaFin);
        $templateProcessor->setValue('seg3', $seguimientos[2]->fechaIni . ' al ' . $seguimientos[2]->fechaFin);
        $templateProcessor->setValue('seg4', $seguimientos[3]->fechaIni . ' al ' . $seguimientos[3]->fechaFin);
    

        $templateProcessor->cloneRow('numControl', $tutorados->count()); // Clonamos una fila para cada tutorado
            
        $rowIndex = 1; 
        foreach ($tutorados as $tutorado) {

            $templateProcessor->setValue('numControl#' . $rowIndex, $tutorado->alumno->noctrl);
            $templateProcessor->setValue('nombre#' . $rowIndex, $tutorado->alumno->nombre . ' ' . $tutorado->alumno->apellidoP . ' ' . $tutorado->alumno->apellidoM);
            
            $rowIndex++;  
        }
            
            
    
        // Guardar el archivo generado
        $templateProcessor->saveAs($outputPath);
    
        // Descargar el archivo generado
        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
    
}
