<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchPublication extends Model
{
  use HasFactory;
  protected $guarded = [];

  protected $table = 'research_publications';

  public function department()
  {
    return $this->belongsTo(Department::class, 'dept_id');
  }
}