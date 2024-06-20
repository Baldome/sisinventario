<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'name' => 'PARQUE DE LAS CULTURAS Y DE LA MADRE TIERRA',
            'logo' => Storage::url('public/images/settings/logo.png'),
            'address' => 'Av. Estación Central, Teleférico Linea Roja, Zona Pura Pura',
            'phone_number' => 223432132,
            'cell_phone' => 71523292,
            'email' => 'pcymt@gmail.com',
            'website' => 'https://www.miteleferico.bo/pcymt/',
            'founding_date' => '2021-06-15',
            'state' => true,
        ]);
    }
}
