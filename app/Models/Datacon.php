<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datacon extends Model
{


    use HasFactory;
    protected $fillable = ['product_unit', 'sale'];
    protected $guarded = ['_token'];
    
}
