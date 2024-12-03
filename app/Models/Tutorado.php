<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorado extends Model
{
    use HasFactory;

    protected $fillable = ['tutores_id', 'alumno_id', 'seguimiento1', 'seguimiento2', 'seguimiento3'];

    public function tutore()
    {
        return $this->belongsTo(Tutores::class);
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
