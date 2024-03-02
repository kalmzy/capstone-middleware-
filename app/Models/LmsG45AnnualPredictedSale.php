<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LmsG45AnnualPredictedSale extends Model
{
  use HasFactory;

  protected $table = 'lms_g45_annualpredictedsales';

  protected $fillable = ['product_id', 'year', 'predicted_sales'];

  protected $dates = ['year'];

  public function product()
  {
    return $this->belongsTo(LmsG41Product::class, 'product_id');
  }
}
