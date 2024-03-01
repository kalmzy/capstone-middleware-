<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
  protected $table = 'sales_report';

  protected $fillable = ['product_id', 'date', 'total_quantity'];

  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }
}
