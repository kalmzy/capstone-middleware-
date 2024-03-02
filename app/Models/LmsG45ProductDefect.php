<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LmsG45ProductDefect extends Model
{
  use HasFactory;
  protected $table = 'lms_g45_productdefects';

  protected $fillable = ['product_id', 'name', 'description', 'status', 'severity', 'inspector'];

  public function product()
  {
    return $this->belongsTo(LmsG41Product::class, 'product_id');
  }
}
