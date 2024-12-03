<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lugar extends Model
{
    use HasFactory;

    protected $fillable = ['nombreLugar', 'nombreCorto', 'edificio_id'];

    public function edificio(): BelongsTo
    {
        return $this->belongsTo(Edificio::class);
    }

    public function grupo(): HasMany
    {
        return $this->hasMany(Grupo::class);
    }

    public function grupo17126s(): HasMany
    {
        return $this->hasMany(Grupo17126::class);
    }

    public function grupoHorario17126s(): HasMany
    {
        return $this->hasMany(GrupoHorario17126::class);
    }
}
