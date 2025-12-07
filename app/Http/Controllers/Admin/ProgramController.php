<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Program;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $programs = Program::all();

    $breadCrumbs = [
      [
        'label' => 'Programs'
      ]
    ];

    return view('admin.programs.list', compact(
      'breadCrumbs',
      'programs'
    ));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $breadCrumbs = [
      [
        'label' => 'Programs',
        'url' => route('admin.programs.index')
      ],
      [
        'label' => 'Create'
      ]
    ];

    return view('admin.programs.create', compact('breadCrumbs'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'program_name' => 'required|unique:programs,program_name',
    ]);

    try {
      Program::create([
        'program_name' => ucwords($request->program_name),
        'is_active' => $request->is_active
      ]);

      return to_route('admin.programs.index')
        ->with('message', 'Record Created Successfully');
    } catch (\Exception $e) {
      Log::error('Insertion Failed: ' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $breadCrumbs = [
      [
        'label' => 'Programs',
        'url' => route('admin.programs.index')
      ],
      [
        'label' => 'Edit'
      ]
    ];
    return view('admin.programs.edit', [
      'program' => Program::findOrFail($id),
      'breadCrumbs' => $breadCrumbs
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'program_name' => 'required|unique:programs,program_name,' . $id,
    ]);

    try {
      Program::where('id', $id)->update([
        'program_name' => ucwords($request->program_name),
        'is_active' => $request->is_active
      ]);

      return to_route('admin.programs.index')
        ->with('message', 'Record Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Update Failed: ' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $program = Program::findOrFail($id);
      $program->delete();

      return response()->json([
        'message' => 'Record Deleted Successfully',
      ], 200);
    } catch (\Exception $e) {
      Log::error('Deletion Failed' . $e->getMessage());
      return response()->json([
        'message' => 'Something Went Wrong Please Try Again',
      ], 500);
    }
  }
}