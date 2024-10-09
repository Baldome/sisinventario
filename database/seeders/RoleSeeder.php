<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear los roles
        $roles = [
            'ADMINISTRADOR',
            'ALMACENERO',
            'USUARIO',
        ];

        foreach ($roles as $roleName) {
            Role::create([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);
        }

        // Obtener el rol de Administrador
        $adminRole = Role::where('name', 'ADMINISTRADOR')->first();

        // Obtener todos los permisos
        $permissions = Permission::all();

        // Asignar todos los permisos al rol de Administrador
        $adminRole->syncPermissions($permissions);

        // Obtener el rol de Almacenero
        $almacenRole = Role::where('name', 'ALMACENERO')->first();

        // Permisos específicos para el rol Almacenero
        $almacenPermissions = [
            //administracion
            'ver activos asignados',
            'ver herramientas asignados',
            //usuarios
            'listar usuarios',
            'editar usuario',
            'crear usuario',
            'visualizar usuario',
            //roles
            'listar roles',
            'visualizar rol',
            'ver permisos asignados',
            //permisos
            'listar permisos',
            'visualizar permiso',
            //ubicaciones
            'listar ubicaciones',
            'editar ubicacion',
            'crear ubicacion',
            'visualizar ubicacion',
            //categorias
            'listar categorias',
            'editar categoria',
            'crear categoria',
            'visualizar categoria',
            //activos
            'listar activos',
            'editar activo',
            'crear activo',
            'visualizar activo',
            'asignar activo',
            'importar activos',
            //herramientas
            'listar herramientas',
            'editar herramienta',
            'crear herramienta',
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
        ];

        // Obtener los permisos específicos
        $permissionsForAlmacen = Permission::whereIn('name', $almacenPermissions)->get();

        // Asignar los permisos específicos al rol de Usuario
        $almacenRole->syncPermissions($permissionsForAlmacen);

        // Obtener el rol de Usuario
        $userRole = Role::where('name', 'USUARIO')->first();

        // Permisos específicos para el rol Usuario
        $userPermissions = [
            //usuarios
            'listar usuarios',
            'visualizar usuario',
            //roles
            //permisos
            //ubicaciones
            'listar ubicaciones',
            'editar ubicacion',
            'crear ubicacion',
            'visualizar ubicacion',
            //categorias
            'listar categorias',
            'editar categoria',
            'crear categoria',
            'visualizar categoria',
            //activos
            'listar activos',
            'editar activo',
            'crear activo',
            'visualizar activo',
            //herramientas
            'listar herramientas',
            'editar herramienta',
            'crear herramienta',
            'visualizar herramienta',
            //prestamos
            'devolver prestamo',
            'crear prestamo',
            'visualizar prestamo',
            'listar tus prestamos',
            //unidades
            'listar unidades',
            'editar unidad',
            'crear unidad',
            'visualizar unidad',
            //estados
            'listar estados',
            'editar estado',
            'crear estado',
            'visualizar estado',
            //reportes
            'reportes',
        ];

        // Obtener los permisos específicos
        $permissionsForUser = Permission::whereIn('name', $userPermissions)->get();

        // Asignar los permisos específicos al rol de Usuario
        $userRole->syncPermissions($permissionsForUser);
    }
}
