<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'anio',
        'categoria_id',
        'disponible'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}