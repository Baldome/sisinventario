<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'MOBILIARIO Y EQUIPO DE OFICINA',
                'description' => 'SILLAS, ESCRITORIOS, ARMARIOS, ESTANTERÍAS.',
            ],
            [
                'name' => 'EQUIPOS DE CÓMPUTO',
                'description' => 'COMPUTADORAS, SERVIDORES, IMPRESORAS.',
            ],
            [
                'name' => 'VEHICULOS',
                'description' => 'AUTOMÓVILES, MOTOCICLETAS, CAMIONES.',
            ],
            [
                'name' => 'MAQUINARIA Y EQUIPO',
                'description' => 'HERRAMIENTAS INDUSTRIALES, MAQUINARIA DE CONSTRUCCIÓN, EQUIPOS DE FABRICACIÓN.',
            ],
            [
                'name' => 'EQUIPOS DE COMUNICACIÓN',
                'description' => 'TELÉFONOS, RADIOS, SISTEMAS DE TELECOMUNICACIONES.',
            ],
            [
                'name' => 'INSTRUMENTOS Y EQUIPOS MÉDICOS',
                'description' => 'MÁQUINAS DE DIAGNÓSTICO, EQUIPOS QUIRÚRGICOS.',
            ],
            [
                'name' => 'INMUEBLES',
                'description' => 'EDIFICIOS, TERRENOS.',
            ],
            [
                'name' => 'EQUIPOS DE SEGURIDAD',
                'description' => 'CÁMARAS, ALARMAS, EXTINTORES.',
            ],
            [
                'name' => 'EQUIPOS ELECTRÓNICOS',
                'description' => 'GENERADORES, TRANSFORMADORES, SISTEMAS DE ILUMINACIÓN.',
            ],
            [
                'name' => 'SOFTWARE',
                'description' => 'LICENCIAS DE SOFTWARE, SISTEMAS OPERATIVOS.',
            ],
            [
                'name' => 'MOBILIARIO DE DECORACIÓN',
                'description' => 'CUADROS, PLANTAS, OBJETOS DECORATIVOS.',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
