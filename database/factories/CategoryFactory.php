<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
  protected $model = Category::class;
  protected $productCategories = ['smartphones'];
  public function definition()
  {
    $categoryName = $this->faker->randomElement($this->productCategories);
    return [
      'category_name' => $categoryName,
      'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
      'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
    ];
  }
}
