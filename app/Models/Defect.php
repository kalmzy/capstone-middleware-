<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defect extends Model
{
  use HasFactory;

  protected $table = 'product_defects';
  protected $fillable = ['name', 'product_id', 'description', 'severity', 'status', 'inspector'];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
