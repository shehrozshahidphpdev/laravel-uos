<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class OricPublication extends Model
{
  protected $guarded = [];

  protected $table = 'oric_publications';

  protected $casts = [
    'authors' => 'array'
  ];
}