<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutores extends Model
{
    use HasFactory;

    protected $fillable = ['personal_id', 'formatoP', 'periodos_id'];

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function periodos()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function tutorados()
    {
        return $this->hasMany(Tutorado::class);
    }
}
