<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ValinFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'id_user' => fake()->numberBetween(1, 5),
      'id_witel' => fake()->numberBetween(1, 6),
      'id_valins' => fake()->unique()->randomNumber(8),
      'gambar1' => function (array $attributes) {
        return $attributes['id_valins'] . '_1.jpg';
      },
      'gambar2' => function (array $attributes) {
        return $attributes['id_valins'] . '_2.jpg';
      },
      'gambar3' => function (array $attributes) {
        return $attributes['id_valins'] . '_3.jpg';
      },
      'ram3' => '-',
      'id_rekon' => fake()->numberBetween(1, 12),
      'keterangan' => '-'
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   */
  public function unverified(): static
  {
    return $this->state(fn (array $attributes) => [
      //
    ]);
  }
}
