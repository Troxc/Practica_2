<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlazaPersonal extends Model
{
    use HasFactory;

    protected $fillable = ['tipoNombramiento', 'plaza_id', 'personal_id'];

    public function plaza(): BelongsTo
    {
        return $this->belongsTo(Plaza::class);
    }

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }
}
