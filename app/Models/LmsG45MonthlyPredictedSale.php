<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LmsG45MonthlyPredictedSale extends Model
{
  use HasFactory;
  protected $table = 'lms_g45_monthlypredictedsales';

  protected $fillable = ['product_id', 'month', 'predicted_sales'];

  protected $casts = [
    'month' => 'datetime:Y-m-d',
  ];

  public function product()
  {
    return $this->belongsTo(LmsG41Product::class, 'product_id');
  }
}
