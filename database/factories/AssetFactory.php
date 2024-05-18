<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => Storage::url('public/images/assets/computer.png'),
            'code' => strtoupper(Str::random(10)), // Código aleatorio de 10 caracteres
            'name' => $this->faker->word, // Nombre aleatorio
            'user_id' => rand(1, 7), // ID de usuario entre 1 y 7
            'state' => $this->faker->randomElement(['Bueno', 'Regular', 'Malo', 'Inoperativo', 'Obsoleto']), // Estado aleatorio
            'admission_date' => now(),
            'model' => $this->faker->word,
            'series' => strtoupper(Str::random(10)),
            'description' => $this->faker->sentence,
            'observations' => $this->faker->paragraph,
            'category_id' => rand(1, 30), // ID de categoría entre 1 y 30
            'location_id' => rand(1, 30), // ID de ubicación entre 1 y 30
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
