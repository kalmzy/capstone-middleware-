<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LmsG41Product extends Model
{
  use HasFactory;
  protected $table = 'lms_g41_products';

  protected $fillable = ['name', 'description', 'unit_price'];

  protected $casts = [
    'unit_price' => 'decimal:2',
  ];

  public function sales()
  {
    return $this->hasMany(Sale::class);
  }

  public function annualPredictedSales()
  {
    return $this->hasMany(LmsG45AnnualPredictedSale::class, 'product_id');
  }

  public function salesReports()
  {
    return $this->hasMany(LmsG45SalesReport::class, 'product_id');
  }

  public function productDefects()
  {
    return $this->hasMany(LmsG45ProductDefect::class, 'product_id');
  }

  public function monthlyPredictedSales()
  {
    return $this->hasMany(LmsG45MonthlyPredictedSale::class, 'product_id');
  }
}
