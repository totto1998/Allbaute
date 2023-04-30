<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parametrizacion extends Model
{
    use HasFactory;

    protected $table = 'parametrizacion';

    protected $fillable = [
          'id',
          'id_tipo',
          'nombre',
          'descripcion',
          'estado',
          'archivo',

      ];


}
