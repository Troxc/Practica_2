<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grupo17126 extends Model
{
    use HasFactory;

    protected $fillable = ['grupo', 'descripcion', 'maxAlumnos', 'periodo_id', 'materia_id', 'personal_id'];

    public function grupoHorario17126s(): HasMany
    {
        return $this->hasMany(GrupoHorario17126::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function alumnoGrupos()
    {
        return $this->hasMany(alumnoGrupo::class);
    }
}
