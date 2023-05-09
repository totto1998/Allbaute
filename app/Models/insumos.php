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
          'id_categ',
          'id_subcateg',
          'nombre',
          'color',
          'unidad',
          'img',
          't_insumo',
          'ancho_tela',


      ];


}
