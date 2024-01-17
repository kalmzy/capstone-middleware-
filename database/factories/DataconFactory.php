<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Datacon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Datacon>
 */
class DataconFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

      $jan = $this->faker->numberBetween(10000, 100000);
      $feb = $this->faker->numberBetween(10000, 100000);
      $mar = $this->faker->numberBetween(10000, 100000);
      $april = $this->faker->numberBetween(10000, 100000);
      $may = $this->faker->numberBetween(10000, 100000);
      $june = $this->faker->numberBetween(10000, 100000);
      $july = $this->faker->numberBetween(10000, 100000);
      $aug = $this->faker->numberBetween(10000, 100000);
      $sept = $this->faker->numberBetween(10000, 100000);
      $oct = $this->faker->numberBetween(10000, 100000);
      $nov = $this->faker->numberBetween(10000, 100000);
      $dec = $this->faker->numberBetween(10000, 100000);

      $totalsale = $jan + $feb + $mar + $april + $may + $june + $july + $aug + $sept + $nov + $oct + $dec;

      return [
          'unit' => $this->faker->word,
          'jan' => $jan,
          'feb' => $feb,
          'mar' => $mar,
          'april' => $april,
          'may' => $may,
          'june' => $june,
          'july' => $july,
          'aug' => $aug,
          'sept' => $sept,
          'nov' => $nov,
          'oct' => $oct,
          'dec' => $dec,
          'totalsale' => $totalsale,
      ];
    }
}
