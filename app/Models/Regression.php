<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regression extends Model
{
  use HasFactory;

  protected $table = 'sales_report';

  protected $fillable = ['product_id', 'date', 'total_quantity'];

  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }
}
