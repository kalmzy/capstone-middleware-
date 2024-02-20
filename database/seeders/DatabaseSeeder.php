<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Defect;
use App\Models\Sale;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Category::factory()
      ->count(1)
      ->create();

    Product::factory()
      ->count(4)
      ->create();
    Defect::factory()
      ->count(50)
      ->create();
  }
}
