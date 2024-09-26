<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hector',
            'email' => 'hector@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => 1,
            'ci' => 84823282,
            'ci_dep' => 'LP',
            'last_name' => 'Pacheco',
            'is_active' => true,
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72481223,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Andrea',
            'email' => 'andreape@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => 2,
            'ci' => 21182328,
            'ci_dep' => 'LP',
            'last_name' => 'Lopez Marca',
            'is_active' => true,
            'birth_date' => '1993-04-23',
            'gender' => 'Mujer',
            'phone' => 72281223,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Richard Angel',
            'email' => 'richard@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => 2,
            'ci' => 8482328,
            'ci_dep' => 'LP',
            'last_name' => 'Quispe Coarite',
            'is_active' => true,
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72281223,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Aram',
            'email' => 'aram@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => 2,
            'ci' => 67820928,
            'ci_dep' => 'LP',
            'last_name' => 'Lanza Marca',
            'is_active' => true,
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72281213,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Eddy',
            'email' => 'eddy@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => 2,
            'ci' => 35820928,
            'ci_dep' => 'LP',
            'last_name' => 'Alí Marca',
            'is_active' => true,
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72201213,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Valerio',
            'email' => 'valerio@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => 2,
            'ci' => 56823928,
            'ci_dep' => 'LP',
            'last_name' => 'Mujía Marca',
            'is_active' => true,
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72201298,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Julio',
            'email' => 'julio@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => 2,
            'ci' => 91123928,
            'ci_dep' => 'CB',
            'last_name' => 'Mujía Marca',
            'is_active' => false,
            'birth_date' => '1992-04-23',
            'gender' => 'Hombre',
            'phone' => 64201298,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
        ])->assignRole('Usuario');
    }
}
