<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
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
          'tags',

     ];
    
     
     

}
