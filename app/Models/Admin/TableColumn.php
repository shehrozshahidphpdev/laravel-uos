<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TableColumn extends Model
{
  protected $guarded = [];

  protected $casts = [
    'columns' => 'array'
  ];

  public function table()
  {
    return $this->belongsTo(Table::class);
  }
}
