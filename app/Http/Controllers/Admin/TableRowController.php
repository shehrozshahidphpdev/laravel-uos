<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Table;
use Illuminate\Http\Request;
use App\Models\Admin\TableRow;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\TableColumn;

class TableRowController extends Controller
{


  public function index(string $id)
  {
    $breadCrumbs = [
      [
        'label' => 'Tables',
        'url' => route('admin.tables.index')
      ],
      [
        'label' => 'Edit/View'
      ]
    ];
    $tableColumns = TableColumn::where('table_id', $id)->first();
    $tableData = TableRow::where('table_id', $id)->with('table')->get();

    // return $tableColumns;

    return view(
      'admin.tablerows.list',
      compact(
        'tableData',
        'tableColumns',
        'breadCrumbs',
      )
    );
  }
  public function create(string $id)
  {
    $breadCrumbs = [
      [
        'label' => 'Tables',
        'url' => route('admin.tables.index')
      ],
      [
        'label' => 'Create'
      ]
    ];
    $tableData = TableColumn::where('id', $id)->with('table')->first();
    // return $tableData;

    $table = Table::where('id',  $tableData->table_id);

    return view('admin.tablerows.create', [
      'breadCrumbs' => $breadCrumbs,
      'tableData' => $tableData,
      'table' => $table
    ]);
  }

  public function store(Request $request)
  {



    $data = $request->validate([
      'table_id' => 'required',
      'rows' => 'required|array|min:1',
      'rows.*' => 'required|string'
    ]);

    try {
      TableRow::create($data);
      return to_route('admin.tables-rows.index', $request->table_id)->with('message', 'Rows Created Successfully!');
    } catch (\Exception $e) {
      Log::error('insertion failed: ' . $e->getMessage());
      return redirect()->back()->with('message', 'Sorry Rows Not Created');
    }
  }

  public function edit(string $id)
  {
    $breadCrumbs = [
      [
        'label' => 'Tables Rows',
        'url' => route('admin.tables-rows.index', $id)
      ],
      [
        'label' => 'Edit'
      ]
    ];

    $tables = Table::all();
    $tableData = TableRow::with('table')->findOrFail($id);
    // return $tableData;

    if ($tableData) {
      return view(
        'admin.tablerows.edit',
        compact(
          'tables',
          'tableData',
          'breadCrumbs'
        )
      );
    } else {
      Log::error('Record Not Found');
    }
  }

  public function update(Request $request, string $id)
  {
    $table_id = $request->table_id;

    $data = $request->validate([
      'rows' => 'required|array|min:1',
      'rows.*' => 'required|string'
    ]);

    try {
      TableRow::where('id', $id)->update($data);
      return to_route('admin.tables-rows.index', $table_id)
        ->with('message', 'Record Updated Successfully!');
    } catch (\Exception $e) {
      Log::error('insertion failed: ' . $e->getMessage());
      return redirect()->back()->with('message', 'Something Went wrong..');
    }
  }
  public function delete(string $id)
  {
    $data = TableRow::findOrFail($id);
    try {
      $data->delete();
      return response()->json([
        'message' => 'Record Deleted Successfully',
      ], 200);
    } catch (\Throwable $e) {
      Log::error('Action Failed: ' . $e->getMessage());
      return response()->json([
        'message' => 'Record Deletetion Failed',
      ], 500);
    }
  }
}
