<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LmsG45SalesReport extends Model
{
  protected $table = 'lms_g45_salesreport';

  protected $fillable = ['date', 'product_id', 'total_quantity'];

  protected $dates = ['date'];

  public function product()
  {
    return $this->belongsTo(LmsG41Product::class, 'product_id');
  }
}
