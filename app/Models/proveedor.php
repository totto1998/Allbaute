<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';

    protected $fillable = [
          'id',
          'razon_social',
          'nit',
          'telefono_fijo',
          'celular',
          'direccion',
          'region',
          'departamento',
          'municipio',
          'email',
          'nombre_contacto',
          't_insumo',
          'tags',

     ];

     public function insumos()
     {
       return $this->belongsTo(insumos::class, 't_insumo');
     }


}
