<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnoGrupo extends Model
{
    use HasFactory;

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function grupo17126()
    {
        return $this->belongsTo(grupo17126::class);
    }
}
