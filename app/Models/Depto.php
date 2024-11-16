<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Depto extends Model
{
    
    use HasFactory;

    protected $fillable = ['idDepto', 'nombreDepto', 'nombreMediano', 'nombreCorto'];

    public function carreras()
    {
        return $this->hasMany(Carrera::class);
    }
    public function personals(): HasMany
    {
        return $this->hasMany(Personal::class);
    }
}
