<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Crear permisos y roles
        $editCategory = Permission::create(['name' => 'Editar Categoría']);
        $administrator = Role::create(['name' => 'Administrador']);

        // Asignar permisos al rol de Administrador
        $administrator->givePermissionTo($editCategory);

        // Crear categoría, ubicación y activo
        Category::create([
            'name' => 'Muebles y enseres',
            'description' => 'Esta categoría contiene todos los muebles',
        ]);

        Location::create([
            'name' => 'Boleteria 1',
            'description' => 'Está ubicado en el teatro galpón',
        ]);

        Asset::create([
            'code' => '12345',
            'name' => 'Computadora',
            'state' => 'Bueno',
            'admission_date' => '2024-02-02',
            'model' => 'HP',
            'series' => 'Serie 1',
            'image' => 'computadora1.jpg',
            'description' => 'Se encuentra en buen estado',
            'observations' => 'Ninguna',
            'category_id' => 1,
            'location_id' => 1,
        ]);

        // Crear usuario administrador
        $user = User::create([
            'name' => 'Maximo Baldomero',
            'email' => 'admin@admin.com',
            'password' => Hash::make('11111111'),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
            'code' => 2468,
            'ci' => 345583,
            'ci_dep' => 'LP',
            'last_name' => 'Yujra Calla',
            'state' => 'Activo',
            'birth_date' => '2002-03-21',
            'gender' => 'Hombre',
            'phone' => 64832211,
            'address' => 'Av. Los Angeles',
        ]);

        // Asignar rol de Administrador al usuario
        $user->assignRole($administrator);
    }
}
