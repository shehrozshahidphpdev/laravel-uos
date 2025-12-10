<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProgramScheme extends Model
{
  protected $table = 'program_schemes';
  protected $guarded = [];

  protected $casts = [
    'courses' => 'array'
  ];

  public function program()
  {
    return $this->belongsTo(Program::class, 'subject_id');
  }
}
