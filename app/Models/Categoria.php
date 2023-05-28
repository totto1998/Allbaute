<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'tabla_categoria';

    protected $fillable = [
        'nombre_categoria',
        'estado_categoria',
        'comentario',
    ];
}
