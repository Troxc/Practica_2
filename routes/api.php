<?php

use App\Http\Controllers\JsonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Solo trae los Datos
Route::get('/periodos.json',    [JsonController::class, 'periodos']);
Route::get('/carreras.json',    [JsonController::class, 'carreras']);
Route::get('/semestres.json',   [JsonController::class, 'semestres']);
Route::get('/materias.json',    [JsonController::class, 'materias']);
Route::get('/deptos.json',      [JsonController::class, 'deptos']);
Route::get('/edificios.json',   [JsonController::class, 'edificios']);
Route::get('/lugares.json',     [JsonController::class, 'lugares']);
Route::get('/docentes.json',    [JsonController::class, 'docentes']);

//Peticiones con Datos
Route::post('/grupos/grupo', [JsonController::class, 'grupos']);        //Rellenado
Route::post('/gruposAgregar/grupo', [JsonController::class, 'agregarGrupo']);  //Agregar
Route::post('/gruposActualizar/grupo', [JsonController::class, 'actualizarGrupo']);  //Actualizar
Route::post('/gruposEliminar/grupo', [JsonController::class, 'eliminarGrupo']);  //Eliminar

// Especial para seleccionar Horas
Route::post('/gruposHoras/grupo', [JsonController::class, 'horasGrupo']); //Filtro Para CEHckBoxs
Route::post('/horas/grupo', [JsonController::class, 'horas']); //Aregar/Eliminar
