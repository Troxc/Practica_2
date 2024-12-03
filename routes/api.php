<?php

use App\Http\Controllers\JsonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/periodos.json',    [JsonController::class, 'periodos']);
Route::get('/carreras.json',    [JsonController::class, 'carreras']);
Route::get('/semestres.json',   [JsonController::class, 'semestres']);
Route::get('/materias.json',    [JsonController::class, 'materias']);
Route::get('/deptos.json',      [JsonController::class, 'deptos']);
Route::get('/edificios.json',   [JsonController::class, 'edificios']);
Route::get('/lugares.json',     [JsonController::class, 'lugares']);

