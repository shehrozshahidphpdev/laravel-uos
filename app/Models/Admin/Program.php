<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
  protected $guarded = [];

  public function programScheme()
  {
    $this->hasOne(ProgramScheme::class);
  }
}
