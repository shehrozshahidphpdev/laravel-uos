<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Program;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProgramScheme;
use Illuminate\Support\Facades\Log;

class SosController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $breadCrumbs = [
      [
        'label' => 'Sos',
      ]
    ];

    return view('admin.sos.list', compact('breadCrumbs'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $breadCrumbs = [
      [
        'label' => 'Sos',
        'url' => route('admin.sos.create')
      ],
      [
        'label' => 'Create',
      ]
    ];
    $programs = Program::all();

    return view('admin.sos.create', compact('breadCrumbs', 'programs'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'program_id' => 'required'
    ], [
      'table_id.required' => 'Please Select a table first'
    ]);

    try {
      ProgramScheme::create([
        'program_id' => $request->program_id,
        'courses' => $request->courses,
      ]);

      return to_route('admin.sos.index')
        ->with('message', 'Record Created Successfully');
    } catch (\Exception $e) {
      Log::error('Insertion Failed' . $e->getMessage());
      return redirect()->back();
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
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
