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
          't_insumo',
          'tags',

     ];

     public function Insumo()
     {
         return $this->hasMany(Insumo::class, 'id', 't_insumo');
     }
     
     public function getTipoInsumoAttribute()
     {
         $insumoIds = explode(',', $this->t_insumo);
         $insumos = Insumo::whereIn('id', $insumoIds)->get();
         $categories = $insumos->pluck('categ')->implode(', ');
         return $categories;
     }
     
     public function getInsumos()
     {
         $insumoIds = explode(',', $this->t_insumo);
         return Insumo::whereIn('id', $insumoIds)->get();
     }
     
     public function getInsumoAttribute()
     {
         $insumos = $this->getInsumos();
         $categories = $insumos->pluck('categ')->implode(', ');
         return $categories;
     }
     
     
     

}
