<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = ['idCarrera', 'nombreCarrera', 'nombreMediano', 'nombreCorto', 'depto_id'];

    public function depto()
    {
        return $this->belongsTo(Depto::class);
    }

    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }

    public function reticulas()
    {
        return $this->hasMany(Reticula::class);
    }
}
