<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $table = 'news';

  protected $guarded = [];

  protected $casts = [
    'additional_info' => 'array'
  ];
}
