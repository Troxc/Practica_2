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
use App\Http\Controllers\NoAdmin;
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
})->middleware('auth')->name("menu2");

Route::get('/', function () {
    return view('menu1');
})->name("menu1");

Route::get('/inicio', function () {
    return view('menu2');
})->middleware('auth')->name('dashboard');

/////////////////////////////////////////////
Route::get('/docentes', function () {
    return view('menu3');
})->middleware('auth')->name('menu3');



//CATALOGOS
Route::get('/catalogos', function () {
    return view('catalogos.catalogos');
})->middleware('auth')->name("cata");

Route::get('/horarios', function () {
    return view('catalogos.horarios');
})->middleware('auth')->name("horarios");

Route::get('/proyects', function () {
    return view('catalogos.proyectos');
})->middleware('auth')->name("proyectos");

Route::get('/tutorias', function () {
    return view('catalogos.tutorias');
})->middleware('auth')->name("tutorias");


//VISTA CATALOGOS
Route::resource('deptos', DeptoController::class)->middleware('auth');
Route::resource('carreras', CarreraController::class)->middleware('auth');
Route::resource('reticulas', ReticulaController::class)->middleware('auth');
Route::resource('materias', MateriaController::class)->middleware('auth');

Route::resource('periodos', PeriodoController::class)->middleware('auth');

Route::resource('alumnos', AlumnoController::class)->middleware('auth');
Route::resource('puestos', PuestoController::class)->middleware('auth');

Route::resource('plazas', PlazaController::class)->middleware('auth');
Route::get('plazas/{plaza}/archivo', [PlazaController::class, 'showFile'])->name('plazas.showFile')->middleware('auth');
Route::get('plazas/{plaza}/word', [PlazaController::class, 'generarWord'])->name('plazas.word')->middleware('auth');




/////////NUEVAs
Route::resource('edificios', EdificioController::class)->middleware('auth');
Route::resource('lugares', LugarController::class)->parameters(['lugares' => 'lugar'])->middleware('auth');
Route::resource('personals', PersonalController::class)->parameters(['personals' => 'personal'])->middleware('auth');
Route::resource('personalPlazas', PlazaPersonalController::class)->middleware('auth');
Route::resource('materiasa', MateriasAbiertasController::class)->middleware('auth');
Route::get('materiasa2', [MateriasAbiertasController::class, 'vacio'])->name("materiasa.vacio")->middleware('auth');

Route::resource('grupos', GrupoController::class)->middleware('auth');
Route::get('grupoP', [GrupoController::class, 'hola'])->name("grupos.hola")->middleware('auth');
Route::resource('grupo17126s', Grupo17126Controller::class)->middleware('auth');

Route::resource('grupoHorario17126s', GrupoHorario17126Controller::class)->middleware('auth');
Route::resource('grupoHorarios', GrupoHorarioController::class)->middleware('auth');
Route::POST('grupoHorarios1/', [GrupoHorarioController::class, 'apoyo'])->name("grupoHorarios.apoyo")->middleware('auth');
Route::POST('grupoHorarios2/', [GrupoHorarioController::class, 'agregarHora'])->name("grupoHorarios.agregarHora")->middleware('auth');
Route::get('grupoHorarios3/', [GrupoHorarioController::class, 'vaciarS'])->name("grupoHorarios.vaciarS")->middleware('auth');
/////////////////////////////////////////////////////////////////////////
///////PROYECTO


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
