<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FechaSeguimiento extends Model
{
    use HasFactory;

    protected $fillable = ['desc', 'fechaIni', 'fechaFin', 'periodo_id'];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
