<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\TableColumn;
use App\Models\Admin\TableRow;

class TableColumnController extends Controller
{
  public function index()
  {
    $columns = TableColumn::with('table')->get();

    $breadCrumbs = [
      [
        'label' => 'Tables Columns'
      ],
    ];

    return view('admin.tablecolumns.list', [
      'breadCrumbs' => $breadCrumbs,
      'tablesColumns' => $columns,
    ]);
  }

  public function create()
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
    $tables = Table::all();


    return view('admin.tablecolumns.create', [
      'breadCrumbs' => $breadCrumbs,
      'tables' => $tables
    ]);
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'table_id' => 'required',
      'columns' => 'required|array|min:1',
      'columns.*' => 'required|string'
    ], [
      'table_id.required' => 'Please Select a Table'
    ]);

    try {
      TableColumn::create([
        'table_id' => $validated['table_id'],
        'columns' => array_map('ucfirst', $validated['columns'])
      ]);
      return to_route('admin.tables-columns.index')
        ->with('message', 'Record Created Successfully!');
    } catch (\Exception $e) {

      Log::error('insertion failed: ' . $e->getMessage());

      return redirect()->back()
        ->with('error', 'Something went wrong! Please try again.');
    }
  }


  public function edit(string $id)
  {
    $breadCrumbs = [
      [
        'label' => 'Tables',
        'url' => route('admin.tables-columns.index')
      ],
      [
        'label' => 'Edit'
      ]
    ];

    $tables = Table::all();
    $tableColumn = TableColumn::with('table')->findOrFail($id);
    $tableColumns = $tableColumn->columns;




    if ($tableColumn) {
      return view(
        'admin.tablecolumns.edit',
        compact(
          'tableColumn',
          'tableColumns',
          'tables',
          'breadCrumbs'
        )
      );
    } else {
      Log::error('Record Not Found');
    }
  }

  public function update(Request $request, string $id)
  {
    $data = $request->validate([
      'table_id' => 'required',
      'columns' => 'required|array|min:1',
      'columns.*' => 'required|string'
    ], [
      'table_id.required' => 'Please Select a Table'
    ]);

    try {
      TableColumn::where('id', $id)->update($data);
      return to_route('admin.tables-columns.index')->with('message', 'Record Updated Successfully!');
    } catch (\Exception $e) {
      Log::error('insertion failed: ' . $e->getMessage());
      return redirect()->back()->with('message', 'Record Created Successfully!');
    }
  }
  public function delete(string $id)
  {
    $data = TableColumn::findOrFail($id);
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
