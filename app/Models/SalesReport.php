<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
  protected $table = 'sales_report';

  protected $fillable = ['date', 'total_quantity'];
}
