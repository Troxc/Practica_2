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
}
