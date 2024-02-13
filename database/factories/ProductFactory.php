<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;
use App\Models\Product;

class ProductFactory extends Factory
{
  protected $model = Product::class;
  protected $categoryProductNames = [
    'smartphones' => ['iPhone', 'Samsung', 'Google', 'LG', 'Sony'],
  ];

  public function definition()
  {
    $category = Category::inRandomOrder()->first();
    $productNamePrefix = $this->faker->randomElement($this->categoryProductNames[$category->category_name]);

    return [
      'product_name' => $productNamePrefix,
      'category_id' => $category->id,
      'price' => 23500,
      'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
      'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
    ];
  }
}
