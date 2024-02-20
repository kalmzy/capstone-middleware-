<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Regression;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Regression>
 */
class RegressionFactory extends Factory
{
  protected $model = Regression::class;
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'created_at' => $this->faker->dateTimeBetween('-1 year', '-1 year'),
      'amount' => $this->faker->numberBetween(50, 200),
    ];
  }
}
