<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Models\Admin\OricTeam;
use App\Http\Controllers\Controller;
use App\Models\Admin\OricPublication;
use App\Models\Admin\Table;
use App\Models\Admin\TableColumn;
use App\Models\Admin\TableRow;

class OricController extends Controller
{
  public $settings;

  public function __construct()
  {
    $this->settings = Setting::first();
  }
  public function oricTeam()
  {
    $tableRows = TableRow::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'oric-team');
      })->get();


    $tableColumns = TableColumn::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'oric-team');
      })->first();

    $tableTitle = Table::where('title', 'oric-team')->select('title')->first();




    return view('user.oric.oric-team', [
      'settings' => $this->settings,
      'banner' => banner('oric-team'),
      'tableColumns' => $tableColumns,
      'tableRows' => $tableRows,
      'tableTitle' => $tableTitle
    ]);
  }
  public function oric()
  {
    return view(
      'user.oric.oric',
      [
        'settings' => $this->settings,
        'banner' => banner('oric-team')
      ]
    );
  }

  public function oricPartner()
  {
    return view('user.oric.oric-partner', [
      'settings' => $this->settings,
      'banner' => banner('oric-partner')
    ]);
  }

  public function oricPublications()
  {
    $tableRows = TableRow::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'Research Publications (235)');
      })->simplePaginate(10);


    $tableColumns = TableColumn::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'Research Publications (235)');
      })->first();

    $tableTitle = Table::where('title', 'Research Publications (235)')->select('title')->first();

    // return $tableColumns;
    // return $tableRows;

    $data = OricPublication::all();
    // dd($data);
    return view('user.oric.oric-publications', [
      'settings' => $this->settings,
      'banner' => banner('oric-publications'),
      'oricPublications' => $data,
      'tableTitle' => $tableTitle,
      'tableColumns' => $tableColumns,
      'tableRows' => $tableRows
    ]);
  }

  public function oricPublicationsSummary()
  {
    $firstTableRows = TableRow::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'Research Publications Department Wise Summary');
      })->simplePaginate(10);


    $firstTableColumns = TableColumn::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'Research Publications Department Wise Summary');
      })->first();

    $secondTableRows = TableRow::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'Research Publications Department Wise Yearly Summary');
      })->simplePaginate(10);


    $secondTableColumns = TableColumn::with('table')
      ->whereHas('table', function ($q) {
        $q->where('title', 'Research Publications Department Wise Yearly Summary');
      })->first();

    $tableTitle = Table::where('title',   'Research Publications Department Wise Summary')
      ->orWhere('title', 'Research Publications Department Wise Yearly Summary')
      ->select('title')
      ->first();

    return view('user.oric.oric-publication-summary', [
      'settings' => $this->settings,
      'banner' => banner('oric-publications-summary'),
      'firstTableRows' => $firstTableRows,
      'firstTableColumns' => $firstTableColumns,
      'tableTitle' => $tableTitle,
      'secondTableRows' => $secondTableRows,
      'secondTableColumns' => $secondTableColumns,
    ]);
  }
}
