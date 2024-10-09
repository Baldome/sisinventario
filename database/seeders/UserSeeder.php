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
            'name' => 'HECTOR WILFREDO',
            'email' => 'hpachecogr@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 1,
            'ci' => 4849338,
            'ci_dep' => 'LP',
            'last_name' => 'PACHECO',
            'is_active' => true,
            'birth_date' => '2000-08-13',
            'gender' => 'HOMBRE',
            'phone' => 7136157,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/4849338.jpg'),
        ])->assignRole('ADMINISTRADOR');

        User::create([
            'name' => 'ANDREA DE LOS ANGELES',
            'email' => 'andreapericonbolivia@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
            'ci' => 4282262,
            'ci_dep' => 'LP',
            'last_name' => 'PERICON ROMERO',
            'is_active' => true,
            'birth_date' => '2000-06-05',
            'gender' => 'MUJER',
            'phone' => 70170144,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/4282262.jpg'),
        ])->assignRole('USUARIO');

        User::create([
            'name' => 'RICHARD ANGEL',
            'email' => 'richardangelqc@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
            'ci' => 8300408,
            'ci_dep' => 'LP',
            'last_name' => 'QUISPE COARITE',
            'is_active' => true,
            'birth_date' => '2000-04-25',
            'gender' => 'HOMBRE',
            'phone' => 78877050,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/8300408.jpg'),
        ])->assignRole('USUARIO');

        User::create([
            'name' => 'JOSE MIGUEL ARAM',
            'email' => 'aramlanza22@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
            'ci' => 8440971,
            'ci_dep' => 'LP',
            'last_name' => 'LANZA QUIROZ',
            'is_active' => true,
            'birth_date' => '2000-02-06',
            'gender' => 'HOMBRE',
            'phone' => 65534304,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/8440971.jpg'),
        ])->assignRole('USUARIO');

        User::create([
            'name' => 'EDDY',
            'email' => 'eddywolf.eqm@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
            'ci' => 8300899,
            'ci_dep' => 'LP',
            'last_name' => 'QUISPE MAMANI',
            'is_active' => true,
            'birth_date' => '2000-12-28',
            'gender' => 'HOMBRE',
            'phone' => 60167325,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/8300899.jpg'),
        ])->assignRole('USUARIO');

        User::create([
            'name' => 'VALERIO',
            'email' => 'vangelio@live.com.mx',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
            'ci' => 6120217,
            'ci_dep' => 'LP',
            'last_name' => 'MACHACA HUANCA',
            'is_active' => true,
            'birth_date' => '2000-09-15',
            'gender' => 'HOMBRE',
            'phone' => 73289274,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/6120217.jpg'),
        ])->assignRole('USUARIO');

        User::create([
            'name' => 'BRAYAM',
            'email' => 'brayamchavez@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 2,
            'ci' => 7099378,
            'ci_dep' => 'LP',
            'last_name' => 'SANTOS CHAVEZ',
            'is_active' => true,
            'birth_date' => '2000-04-23',
            'gender' => 'HOMBRE',
            'phone' => 60167325,
            'address' => 'Camino Manzano,Bueno de San Pedro',
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/7099378.jpg'),
        ])->assignRole('ALMACENERO');
    }
}
