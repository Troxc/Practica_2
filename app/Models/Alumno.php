<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;

    protected $fillable = ['noctrl', 'nombre', 'apellidoP', 'apellidoM', 'sexo', 'carrera_id'];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function alumnoGrupos()
    {
        return $this->hasMany(alumnoGrupo::class);
    }
}
