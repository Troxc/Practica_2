<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = ['RFC', 'nombres', 'apellidoP', 'apellidoM',
     'licenciatura', 'lictic', 'especializacion', 'espetit',
    'maestria', 'maetit', 'doctorado', 'doctit', 'fechaIngSep', 'fechaIngIns', 'depto_id', 'puesto_id'];

    public function  personalPlazas(): HasMany
    {
        return $this->hasMany(PlazaPersonal::class);
    }

    public function depto(): BelongsTo
    {
        return $this->belongsTo(Depto::class);
    }

    public function puesto(): BelongsTo
    {
        return $this->belongsTo(Puesto::class);
    }
}
