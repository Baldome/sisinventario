<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'code' => 1,
                'name' => 'JUEGO DE LLAVES CRESCENT DE 8"-10"-12" ENGOMADAS',
                'unit_id' => 1, // Assuming 1 corresponds to "JUEGO"
                'amount' => 1,
            ],
            [
                'code' => 2,
                'name' => 'COMBO DE ACERO DE 5KG',
                'unit_id' => 2, // Assuming 2 corresponds to "PIEZA"
                'amount' => 1,
            ],
            [
                'code' => 3,
                'name' => 'REMACHADORA DE 10"',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 4,
                'name' => 'JUEGO DE LLAVES ALLEN MILIMÉTRICAS 13 PIEZAS TR 15542',
                'unit_id' => 1,
                'amount' => 1,
            ],
            [
                'code' => 5,
                'name' => 'ARCO DE SIERRA PROFESIONAL 12"',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 6,
                'name' => 'SIERRA DE REPUESTO PARA ARCO DE 12"',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 7,
                'name' => 'NIVEL TORPEDO 190MM PLASTICO',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 8,
                'name' => 'ATORNILLADOR RECARGABLE 20V CON 2 BATERÍAS EN MALETÍN',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 9,
                'name' => 'TESTER DE RED CON SEGUIDOR DE LINEA UNI-T UT 682',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 10,
                'name' => 'CRIMPADOR DE RED RJ-45 HURRICANE HT L2180',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 11,
                'name' => 'MEDIDOR DE DISTANCIA LASER DE 60MT',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 12,
                'name' => 'PROBADOR DE CIRCUITOS 100V500V',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 13,
                'name' => 'JUEGO DE LLAVES STILSON PRETUL 4 PIEZAS (8"-10"-12"-14")',
                'unit_id' => 1,
                'amount' => 1,
            ],
            [
                'code' => 14,
                'name' => 'CINCEL FORJADO DE 3/4"X 8"',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 15,
                'name' => 'PALA AGARRADOR DE PLÁSTICO',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 16,
                'name' => 'PICOTA MINERA 4.5LBS',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 17,
                'name' => 'CARRETILLA NEUMÁTICA CON RODAMIENTO 65LTS CALIB/21',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 18,
                'name' => 'SERRUCHO 18"',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 19,
                'name' => 'LLAVE ALLEN 2.5MM',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 20,
                'name' => 'LLAVE ALLEN 3MM',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 21,
                'name' => 'PINZA ANTIESTATICA PUNTA FINA',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 22,
                'name' => 'PISTOLA DE SILICONA 220V 30W (SILICONA DELGADA)',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 23,
                'name' => 'ESCALERA PLEGABLE 4X5 PELDAÑOS 150KG 5.60MT EXTENDIDA',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 24,
                'name' => 'MOCHILA DE HERRAMIENTAS NEGRA',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 25,
                'name' => 'CANDADO LAMINADO 50MM LLAVE NORMAL',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 26,
                'name' => 'CADENA DE SEGURIDAD 15MM 1.2MT USO RUDO',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 27,
                'name' => 'JUEGO DE TARRAJAS PARA TUBO PVC 3PIEZAS',
                'unit_id' => 1,
                'amount' => 1,
            ],
            [
                'code' => 28,
                'name' => 'JUEGO DE DESTORNILLADORES 6PIEZAS',
                'unit_id' => 1,
                'amount' => 1,
            ],
            [
                'code' => 29,
                'name' => 'LLAVE DE PASO DE 1/2"',
                'unit_id' => 2,
                'amount' => 1,
            ],
            [
                'code' => 30,
                'name' => 'CUERDA DE PERLON DE 1.5CM',
                'unit_id' => 3, // Assuming 3 corresponds to "METRO"
                'amount' => 1,
            ],
            [
                'code' => 31,
                'name' => 'JUEGO DE BROCHAS PELO SINTETICO PRETUL 5 PZAS (1"- 1 1/2"- 2" - 2 1/2" - 3"',
                'unit_id' => 1,
                'amount' => 1,
            ],
        ];

        foreach ($tools as $tool) {
            DB::table('tools')->insert([
                'code' => $tool['code'],
                'name' => $tool['name'],
                'state_id' => 1, // Assuming 1 is the default state (e.g., "Available")
                'user_id' => 3,
                'unit_id' => $tool['unit_id'],
                'category_id' => 4, // Assuming 1 is a default category
                'location_id' => 113, // Assuming 1 is a default location
                'admission_date' => Carbon::now(),
                'amount' => $tool['amount'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
