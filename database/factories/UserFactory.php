<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $level_akses = ['Manager', 'Teknisi', 'Validator'];
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'last_login' => now(),
            'password' => bcrypt('admin'),
            'warna' => fake()->hexColor(),
            'level_akses' => $level_akses[rand(0, 2)],
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'last_login' => null,
        ]);
    }
}
