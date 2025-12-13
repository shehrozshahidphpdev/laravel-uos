<?php

namespace App\Models\Admin;

use App\Models\Admin\Department;
use Illuminate\Database\Eloquent\Model;

class FacultyProfile extends Model
{
  protected $guarded = [];

  protected $table = 'faculty_profiles';


  public function department()
  {
    return $this->belongsTo(Department::class, 'dept_id');
  }
}