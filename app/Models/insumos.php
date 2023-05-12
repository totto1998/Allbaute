<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insumos extends Model
{
    use HasFactory;

    protected $table = 'insumos';

    protected $fillable = [
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
          'created_at',


      ];


}
