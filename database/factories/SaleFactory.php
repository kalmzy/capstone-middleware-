<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
  protected $model = Sale::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'sale_date' => $this->faker->dateTimeBetween('-1 year'),
      'quantity' => $this->faker->numberBetween(50, 200),
    ];
  }
}
