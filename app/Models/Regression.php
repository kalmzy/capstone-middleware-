<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regression extends Model
{
  use HasFactory;

  protected $table = 'sales_report';

  protected $fillable = ['date', 'total_quantity'];
}
