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
            'code' => $this->faker->unique()->numberBetween(10000, 99999),
            'name' => $this->faker->unique()->word, // Nombre aleatorio
            'user_id' => rand(1, 7), // ID de usuario entre 1 y 7
            'state_id' => rand(1, 6),
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
