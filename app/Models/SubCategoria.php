<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;

    protected $table = 'tabla_sub_categoria';

    protected $fillable = [
        'id_categ',
        'nombre_sub_categoria',
        'estado_sub_categoria',
        'comentario',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categ', 'id');
    }
}
