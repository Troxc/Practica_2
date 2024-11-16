<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materia extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'idMateria',
        'nombreMateria',
        'nivel',
        'nombreMediano',
        'nombreCorto',
        'modalidad',
        'reticula_id'
    ];

    public function reticula()
    {
        return $this->belongsTo(Reticula::class);
    }

    public function materiasAbiertas(): HasMany
    {
        return $this->hasMany(MateriasAbiertas::class);
    }
}
