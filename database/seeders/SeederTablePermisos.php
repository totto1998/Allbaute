<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;

class SeederTablePermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            //tabla roles
            'ver-roles',
            'crear-roles',
            'editar-roles',
            'borrar-roles',

            //tabla user
            'ver-user',
            'crear-user',
            'editar-user',
            'borrar-user',

            //tabla proveedor
            'ver-proveedor',
            'crear-proveedor',
            'editar-proveedor',
            'borrar-proveedor',

            //tabla parametrizacion
            'ver-parametrizacion',
            'crear-parametrizacion',
            'editar-parametrizacion',
            'borrar-parametrizacion',

            //tabla insumos
            'ver-insumos',
            'crear-insumos',
            'editar-insumos',
            'borrar-insumos',

            //tabla ordenCompra
            'ver-ordenCompra',
            'crear-ordenCompra',
            'editar-ordenCompra',
            'borrar-ordenCompra',

            
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}