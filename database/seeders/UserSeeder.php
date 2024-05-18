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
            'password' => Hash::make('11111'),
            'code' => 1262622,
            'role_id' => 1,
            'ci' => 84823282,
            'ci_dep' => 'LP',
            'last_name' => 'Pacheco',
            'state' => 'Activo',
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72481223,
            'address' => 'Camino Manzano, 54, Ático 0º, 21501, O Bueno de San Pedro',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
            'current_team_id' => null,
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Andrea',
            'email' => 'andreape@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111'),
            'code' => 9262602,
            'role_id' => 2,
            'ci' => 21182328,
            'ci_dep' => 'LP',
            'last_name' => 'Lopez Marca',
            'state' => 'Activo',
            'birth_date' => '1993-04-23',
            'gender' => 'Mujer',
            'phone' => 72281223,
            'address' => 'Camino Manzano, 54, Ático 0º, 21501, O Bueno de San Pedro',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
            'current_team_id' => null,
        ])->assignRole('Usuario Andrea');

        User::create([
            'name' => 'Richard Angel',
            'email' => 'richard@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111'),
            'code' => 726262,
            'role_id' => 3,
            'ci' => 8482328,
            'ci_dep' => 'LP',
            'last_name' => 'Quispe Coarite',
            'state' => 'Activo',
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72281223,
            'address' => 'Camino Manzano, 54, Ático 0º, 21501, O Bueno de San Pedro',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
            'current_team_id' => null,
        ])->assignRole('Usuario Richard');

        User::create([
            'name' => 'Aram',
            'email' => 'aram@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111'),
            'code' => 23642162,
            'role_id' => 4,
            'ci' => 67820928,
            'ci_dep' => 'LP',
            'last_name' => 'Lanza Marca',
            'state' => 'Activo',
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72281213,
            'address' => 'Camino Manzano, 54, Ático 0º, 21501, O Bueno de San Pedro',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
            'current_team_id' => null,
        ])->assignRole('Usuario Aram');

        User::create([
            'name' => 'Eddy',
            'email' => 'eddy@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111'),
            'code' => 7264202,
            'role_id' => 5,
            'ci' => 35820928,
            'ci_dep' => 'LP',
            'last_name' => 'Alí Marca',
            'state' => 'Activo',
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72201213,
            'address' => 'Camino Manzano, 54, Ático 0º, 21501, O Bueno de San Pedro',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
            'current_team_id' => null,
        ])->assignRole('Usuario Eddy');

        User::create([
            'name' => 'Valerio',
            'email' => 'valerio@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111'),
            'code' => 4664200,
            'role_id' => 6,
            'ci' => 56823928,
            'ci_dep' => 'LP',
            'last_name' => 'Mujía Marca',
            'state' => 'Activo',
            'birth_date' => '1993-04-23',
            'gender' => 'Hombre',
            'phone' => 72201298,
            'address' => 'Camino Manzano, 54, Ático 0º, 21501, O Bueno de San Pedro',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
            'current_team_id' => null,
        ])->assignRole('Usuario Valerio');

        User::create([
            'name' => 'Julio',
            'email' => 'julio@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111'),
            'code' => 10642910,
            'role_id' => 7,
            'ci' => 91123928,
            'ci_dep' => 'CB',
            'last_name' => 'Mujía Marca',
            'state' => 'Inactivo',
            'birth_date' => '1992-04-23',
            'gender' => 'Hombre',
            'phone' => 64201298,
            'address' => 'Camino Manzano, 54, Ático 0º, 21501, O Bueno de San Pedro',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
            'current_team_id' => null,
        ])->assignRole('Usuario Julio');
    }
}
