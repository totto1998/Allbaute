<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TipoParametrizacion;

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
          // 'archivo',

      ];

      public function tipoParametrizacion()
      {
        return $this->belongsTo(TipoParametrizacion::class, 'id_tipo');
      }

      
      


}
