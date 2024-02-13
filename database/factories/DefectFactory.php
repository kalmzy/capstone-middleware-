<?php

namespace Database\Factories;

use App\Models\Defect;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class DefectFactory extends Factory
{
  protected $model = Defect::class;

  public function definition()
  {
    $products = Product::inRandomOrder()->first();
    return [
      'product_id' => $products->id,
      'name' => $this->faker->randomElement([
        'Dimensional',
        'Surface',
        'Material',
        'Functional',
        'Assembly',
        'Aesthetic',
        'Packaging',
        'Labelling',
      ]),
      'description' => $this->faker->sentence,
      'status' => $this->faker->randomElement(['open', 'resolved', 'closed']),
      'severity' => $this->faker->randomElement(['low', 'medium', 'high', 'critical']),
      'assigned_to' => $this->faker->name,
      'reported_by' => $this->faker->name,
      'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
    ];
  }
}
