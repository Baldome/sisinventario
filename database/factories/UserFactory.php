<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = Role::all()->pluck('id')->toArray();

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'code' => $this->faker->unique()->randomNumber(6),
            'role_id' => $this->faker->randomElement($roles),
            'ci' => $this->faker->unique()->randomNumber(8),
            'ci_dep' => $this->faker->randomElement(['LP', 'CB', 'SC', 'OR', 'PT', 'TJ', 'CH', 'PA', 'BE']),
            'last_name' => $this->faker->lastName,
            'state' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Hombre', 'Mujer']),
            'phone' => $this->faker->numberBetween(10000000, 99999999), // Genera un número de teléfono aleatorio de 10 dígitos
            'address' => $this->faker->address,
            'remember_token' => Str::random(10),
            'profile_photo_path' => Storage::url('public/images/users/avatar.png'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn(array $attributes, User $user) => [
                    'name' => $user->name . '\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
