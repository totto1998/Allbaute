<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insumos extends Model
{
    use HasFactory;

    protected $table = 'insumos';

    protected $fillable = [
          'nombre',
          'id',
          'img',
          'tags',
          'categ',
          'precio',
          'stock',
          'descuento',
          'color',
          'unidad',
          'ancho',
          'material',
          'estado',
          'created_at',


      ];


}
