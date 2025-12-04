<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TableRow extends Model
{
  protected $guarded = [];

  protected $casts = [
    'rows' => 'array'
  ];

  public function table()
  {
    return $this->belongsTo(Table::class);
  }
}
