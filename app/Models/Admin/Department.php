<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $guarded = [];

  protected $casts = [
    'offered_courses' => 'array',
  ];

  public function chairmanProfile()
  {
    return $this->hasOne(ChairmanProfile::class);
  }


  public function reserachPublication()
  {
    return $this->hasOne(ResearchPublication::class);
  }
}