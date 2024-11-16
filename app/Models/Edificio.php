<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Edificio extends Model
{
    protected $fillable = ['nombreEdificio', 'nombreCorto'];

    public function lugars(): HasMany
    {
        return $this->hasMany(Lugar::class);
    }
}
