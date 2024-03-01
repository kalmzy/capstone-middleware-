<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $table = 'products';

  protected $fillable = ['category_id', 'product_name', 'price'];

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }
  public function sales()
  {
    return $this->hasMany(Sale::class, 'product_id', 'id');
  }
  public function defects()
  {
    return $this->hasMany(Defect::class);
  }
  public function regression()
  {
    return $this->hasMany(Regression::class, 'product_id', 'id');
  }
}
