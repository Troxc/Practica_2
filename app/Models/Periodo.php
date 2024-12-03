<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periodo extends Model
{

    use HasFactory;

    protected $fillable = ['idPeriodo', 'periodo', 'descCorta', 'fechaIni', 'fechaFin'];

    public function materiasAbiertas(): HasMany
    {
        return $this->hasMany(MateriasAbiertas::class);
    }

    public function fechaSeguimientos(): HasMany
    {
        return $this->hasMany(FechaSeguimiento::class);
    }


    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class);
    }

    public function grupo17126s(): HasMany
    {
        return $this->hasMany(Grupo17126::class);
    }

    public function tutores(): HasMany
    {
        return $this->hasMany(Tutores::class);
    }
}
