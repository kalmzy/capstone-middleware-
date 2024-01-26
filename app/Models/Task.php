<?php

// app/Models/Task.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  protected $guarded = ['_token'];
  protected $fillable = [
    'product_unit',
    'location_part_id',
    'description',
    'severity_level',
    'root_cause_analysis',
    'corrective_action_taken',
    'verification_of_correction',
    'status',
    'notes_comments',
];


  // rest of your model code...
}
