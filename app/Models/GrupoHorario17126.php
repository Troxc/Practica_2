<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrupoHorario17126 extends Model
{
    use HasFactory;

    protected $fillable = ['grupo17126_id', 'lugar_id', 'dia', 'hora'];

    public function grupo17126(): BelongsTo
    {
        return $this->belongsTo(Grupo17126::class);
    }

    public function lugar()
    {
        return $this->belongsTo(Lugar::class);
    }

}
