<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plaza extends Model
{
    /** @use HasFactory<\Database\Factories\PlazaFactory> */
    use HasFactory;

    protected $fillable = ['idPlaza', 'nombrePlaza'];

    public function  personalPlazas(): HasMany
    {
        return $this->hasMany(PlazaPersonal::class);
    }
}
