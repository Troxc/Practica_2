<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DeptoController;
use App\Http\Controllers\EdificioController;
use App\Http\Controllers\FechaSeguimientoController;
use App\Http\Controllers\Grupo17126Controller;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\GrupoHorario17126Controller;
use App\Http\Controllers\GrupoHorarioController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MateriasAbiertasController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\PlazaPersonalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\ReticulaController;
use App\Http\Controllers\TutoradoController;
use App\Http\Controllers\TutoresController;
use App\Http\Controllers\VerTutores;
use Illuminate\Support\Facades\Route;

//Menus Inicio
Route::get('/inicio', function () {
    return view('menu2');
})->middleware(['auth', 'verified'])->name("menu2");

Route::get('/', function () {
    return view('menu1');
})->name("menu1");

Route::get('/inicio', function () {
    return view('menu2');
})->middleware(['auth', 'verified'])->name('dashboard');


//CATALOGOS
Route::get('/catalogos', function () {
    return view('catalogos.catalogos');
})->middleware(['auth', 'verified'])->name("cata");

Route::get('/horarios', function () {
    return view('catalogos.horarios');
})->middleware(['auth', 'verified'])->name("horarios");

Route::get('/proyects', function () {
    return view('catalogos.proyectos');
})->middleware(['auth', 'verified'])->name("proyectos");

Route::get('/tutorias', function () {
    return view('catalogos.tutorias');
})->middleware(['auth', 'verified'])->name("tutorias");


//VISTA CATALOGOS
Route::resource('deptos', DeptoController::class)->middleware(['auth', 'verified']);
Route::resource('carreras', CarreraController::class)->middleware(['auth', 'verified']);
Route::resource('reticulas', ReticulaController::class)->middleware(['auth', 'verified']);
Route::resource('materias', MateriaController::class)->middleware(['auth', 'verified']);

Route::resource('periodos', PeriodoController::class)->middleware(['auth', 'verified']);

Route::resource('alumnos', AlumnoController::class)->middleware(['auth', 'verified']);
Route::resource('puestos', PuestoController::class)->middleware(['auth', 'verified']);

Route::resource('plazas', PlazaController::class)->middleware(['auth', 'verified']);
Route::get('plazas/{plaza}/archivo', [PlazaController::class, 'showFile'])->name('plazas.showFile');
Route::get('plazas/{plaza}/word', [PlazaController::class, 'generarWord'])->name('plazas.word');




/////////NUEVAs 
Route::resource('edificios', EdificioController::class)->middleware(['auth', 'verified']);
Route::resource('lugares', LugarController::class)->parameters(['lugares' => 'lugar'])->middleware(['auth', 'verified']);
Route::resource('personals', PersonalController::class)->parameters(['personals' => 'personal'])->middleware(['auth', 'verified']);
Route::resource('personalPlazas', PlazaPersonalController::class)->middleware(['auth', 'verified']);
Route::resource('materiasa', MateriasAbiertasController::class);
Route::get('materiasa2', [MateriasAbiertasController::class, 'vacio'])->name("materiasa.vacio");

Route::resource('grupos', GrupoController::class);
Route::get('grupoP', [GrupoController::class, 'hola'])->name("grupos.hola");
Route::resource('grupo17126s', Grupo17126Controller::class);

Route::resource('grupoHorario17126s', GrupoHorario17126Controller::class);
Route::resource('grupoHorarios', GrupoHorarioController::class);

/////////////////////////////////////////////////////////////////////////
///////PROYECTO

Route::resource('seguimientos', FechaSeguimientoController::class)->middleware(['auth', 'verified']);

Route::get('tutores', [TutoresController::class, 'index'])->name("tutores.index");
Route::get('tutores1', [TutoresController::class, 'cancelar'])->name("tutores.cancelar");
Route::get('tutores2', [TutoresController::class, 'guardar'])->name("tutores.guardar");

Route::resource('tutorados', TutoradoController::class)->middleware(['auth', 'verified']);
Route::get('tutoradosG', [TutoradoController::class, 'generarReporte'])->name("tutorados.generarR");


Route::resource('vertutores', VerTutores::class);
Route::get('vertutores1/{tutor}', [VerTutores::class, 'verAlumnado'])->name("verturores.verAlumnado");
Route::get('vertutores2/{tutorado}/{campo}', [VerTutores::class, 'generarReporte'])->name("verturores.generarR");
Route::get('vertutores3/{tutorado}/{campo}', [VerTutores::class, 'verFormulario'])->name("verturores.verFormulario");


Route::get('vertutores4/{tutorado}/{campo}', [VerTutores::class, 'verDocumento'])->name("verturores.verDocumento");
Route::get('plazas/{plaza}/archivo', [PlazaController::class, 'showFile'])->name('plazas.showFile');

Route::post('vertutores5/{tutorado}/{campo}', [VerTutores::class, 'guardarArchivo'])->name("verturores.guardar");



//Route::get('vertutores2/{id}/{campo}', [VerTutores::class, 'generarReporte'])->name("verturores.generarR");
/////////////////////////////////////////////////////////////////////////





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
