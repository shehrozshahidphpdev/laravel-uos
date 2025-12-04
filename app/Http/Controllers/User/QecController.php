<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Table;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Models\Admin\TableRow;
use App\Models\Admin\TableColumn;
use App\Http\Controllers\Controller;

class QecController extends Controller
{
  public $settings;
  public function __construct()
  {
    $this->settings = Setting::first();
  }
  public function qec()
  {
    return view(
      'user.qec',
      [
        'settings' => $this->settings,
        'banner' => banner('qec')

      ]
    );
  }

  public function qecTeam()
  {

    $tableRows = TableRow::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'QUALITY ENHANCEMENT CELL (QEC)');
      })->simplePaginate(10);


    $tableColumns = TableColumn::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'QUALITY ENHANCEMENT CELL (QEC)');
      })->first();

    $tableTitle = Table::where('title', 'QUALITY ENHANCEMENT CELL (QEC)')->select('title')->first();

    return view('user.qec-team', [
      'settings' => $this->settings,
      'banner' => banner('qec'),
      'tableTitle' => $tableTitle,
      'tableColumns' => $tableColumns,
      'tableRows' => $tableRows
    ]);
  }
}
