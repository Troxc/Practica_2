<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reticula extends Model
{
    
    use HasFactory;

    protected $fillable = ['idReticula', 'descripcion', 'fechaEnVigor', 'carrera_id'];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
}
