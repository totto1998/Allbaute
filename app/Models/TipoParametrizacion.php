<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoParametrizacion extends Model
{
    use HasFactory;
    protected $table = 'tipo_parametrizacion';

    protected $fillable = [
          'id',
          'nombre',
    
      ];

}
