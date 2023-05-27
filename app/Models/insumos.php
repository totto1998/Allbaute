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
          'nombre',
          'img',
          'tags',
          'categ',
          'subcateg',
          'color',
          'unidad',
          'estado',
          'created_at',
      ];


}
