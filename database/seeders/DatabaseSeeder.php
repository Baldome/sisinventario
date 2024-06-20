<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            LocationSeeder::class,
            CategorySeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            AssetSeeder::class,
            UnitSeeder::class,
            ToolSeeder::class,
            LoanSeeder::class,
            SettingSeeder::class,
        ]);

        // // Crear permisos y roles
        // $editCategory = Permission::create(['name' => 'Editar Categoría']);
        // $administrator = Role::create(['name' => 'Administrador']);

        // // Asignar permisos al rol de Administrador
        // $administrator->givePermissionTo($editCategory);

        // // Crear usuario administrador
        // $user = User::create([
        //     'name' => 'Maximo Baldomero',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('11111111'),
        //     'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
        //     'role_id' => 1,
        //     'code' => 2468,
        //     'ci' => 345583,
        //     'ci_dep' => 'LP',
        //     'last_name' => 'Yujra Calla',
        //     'state' => 'Activo',
        //     'birth_date' => '2002-03-21',
        //     'gender' => 'Hombre',
        //     'phone' => 64832211,
        //     'address' => 'Av. Los Angeles',
        // ]);

        // // Asignar rol de Administrador al usuario
        // $user->assignRole($administrator);

    }
}
