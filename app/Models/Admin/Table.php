<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
  protected $guarded = [];

  public function column()
  {
    return $this->hasOne(TableColumn::class);
  }

  public function row()
  {
    return $this->hasOne(TableRow::class);
  }
}
