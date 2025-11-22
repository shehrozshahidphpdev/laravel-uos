<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $guarded = [];

  protected $casts = [
    'images' => 'array'
  ];
}
