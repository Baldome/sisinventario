<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert([
            ['name' => 'NUEVO', 'description' => 'Estado completamente nuevo, sin uso previo'],
            ['name' => 'BUENO', 'description' => 'En buen estado, funcionando correctamente'],
            ['name' => 'REGULAR', 'description' => 'En estado regular, puede presentar algunos desperfectos'],
            ['name' => 'MALO', 'description' => 'En mal estado, con problemas significativos'],
            ['name' => 'INOPERATIVO', 'description' => 'No funciona, requiere reparaciones'],
            ['name' => 'OBSOLETO', 'description' => 'Ya no se utiliza, tecnología desfasada'],
        ]);
    }
}
