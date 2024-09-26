<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tool>
 */
class ToolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => Storage::url('public/images/tools/image.png'),
            'code' => $this->faker->unique()->numberBetween(10000, 99999),
            'name' => $this->faker->unique()->name(),
            'state_id' => rand(1, 6),
            'user_id' => rand(1, 7),
            'unit_id' => rand(1, 30),
            'category_id' => rand(1, 30),
            'location_id' => rand(1, 30),
            'admission_date' => now(),
            'amount' => rand(1, 50),
            'description' => $this->faker->sentence,
            'observations' => $this->faker->paragraph,
        ];
    }
}
