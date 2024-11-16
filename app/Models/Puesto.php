<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Puesto extends Model
{
    /** @use HasFactory<\Database\Factories\PuestoFactory> */
    use HasFactory;

    protected $fillable = ['idPuesto', 'nombre', 'tipo'];

    public function personals(): HasMany
    {
        return $this->hasMany(Personal::class);
    }
}
