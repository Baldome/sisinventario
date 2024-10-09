<?php

namespace Database\Seeders;

use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'name' => 'JUEGO',
                'description' => 'Conjunto de herramientas o piezas que forman una unidad',
            ],
            [
                'name' => 'PIEZA',
                'description' => 'Unidad individual de una herramienta o elemento',
            ],
            [
                'name' => 'METRO',
                'description' => 'Unidad de medida de longitud',
            ],
        ];

        foreach ($units as $unit) {
            DB::table('units')->insert([
                'name' => $unit['name'],
                'description' => $unit['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
