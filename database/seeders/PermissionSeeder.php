<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //administracion
            'administracion',
            'ver activos asignados',
            'ver herramientas asignados',
            //usuarios
            'listar usuarios',
            'editar usuario',
            'crear usuario',
            'eliminar usuario',
            'visualizar usuario',
            //roles
            'listar roles',
            'editar rol',
            'crear rol',
            'eliminar rol',
            'visualizar rol',
            'ver permisos asignados',
            'asignar permisos al rol',
            //permisos
            'listar permisos',
            'visualizar permiso',
            //ubicaciones
            'listar ubicaciones',
            'editar ubicacion',
            'crear ubicacion',
            'eliminar ubicacion',
            'visualizar ubicacion',
            //categorias
            'listar categorias',
            'editar categoria',
            'crear categoria',
            'eliminar categoria',
            'visualizar categoria',
            //activos
            'listar activos',
            'editar activo',
            'crear activo',
            'eliminar activo',
            'visualizar activo',
            'asignar activo',
            'importar activos',
            //herramientas
            'listar herramientas',
            'editar herramienta',
            'crear herramienta',
            'eliminar herramienta',
            'visualizar herramienta',
            'asignar herramienta',
            'importar herramientas',
            //prestamos
            'listar prestamos',
            'devolver prestamo',
            'crear prestamo',
            'visualizar prestamo',
            'listar tus prestamos',
            //unidades
            'listar unidades',
            'editar unidad',
            'crear unidad',
            'eliminar unidad',
            'visualizar unidad',
            //estados
            'listar estados',
            'editar estado',
            'crear estado',
            'eliminar estado',
            'visualizar estado',
            //reportes
            'reportes',
            'generar reporte de activos',
            'generar reporte de herramientas',
            'generar reporte de prestamos por meses',
            'generar reporte de prestamos',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
