<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
  public function index()
  {
    $tables = Table::all();
    $breadCrumbs = [
      [
        'label' => 'Tables'
      ],
    ];

    return view('admin.tables.list', [
      'breadCrumbs' => $breadCrumbs,
      'tables' => $tables
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

    return view('admin.tables.create', [
      'breadCrumbs' => $breadCrumbs
    ]);
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'title' => 'required'
    ]);

    try {
      Table::create($data);
      return to_route('admin.tables.index')->with('message', 'Record Created Successfully!');
    } catch (\Exception $e) {
      Log::error('insertion failed: ' . $e->getMessage());
      return redirect()->back()->with('message', 'Record Created Successfully!');
    }
  }

  public function edit(string $id)
  {
    $breadCrumbs = [
      [
        'label' => 'Tables',
        'url' => route('admin.tables.index')
      ],
      [
        'label' => 'Edit'
      ]
    ];

    $table = Table::findOrFail($id);
    if ($table) {
      return view('admin.tables.edit', compact('table', 'breadCrumbs'));
    } else {
      Log::error('Record Not Found');
    }
  }

  public function update(Request $request, string $id)
  {
    $data = $request->validate([
      'title' => 'required'
    ]);

    try {
      Table::where('id', $id)->update($data);

      return to_route('admin.tables.index')->with('message', 'Record updated Successfully!');
    } catch (\Exception $e) {
      Log::error('insertion failed: ' . $e->getMessage());

      return redirect()->back()->with('message', 'something went wrong');
    }
  }
  public function delete(string $id)
  {
    $data = Table::findOrFail($id);
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
