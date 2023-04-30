<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;

    protected $table = 'ordencompra';

    protected $fillable = [
        'id',
        'id_proveedor',
        'id_formapago',
        'fecha_solicitud',
        'total',
        'archivo',

    ];


}
