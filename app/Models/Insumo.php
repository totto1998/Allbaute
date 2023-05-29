<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
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

      public function categoria()
      {
          return $this->belongsTo(Categoria::class, 'categ', 'nombre_categoria');
      }

      public function subcategoria()
      {
          return $this->belongsTo(SubCategoria::class, 'subcateg');
      }
  


}
