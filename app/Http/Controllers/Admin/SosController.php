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
    $schemes = ProgramScheme::with('program')->get();

    // return $schemes;

    $breadCrumbs = [
      [
        'label' => 'Sos',
      ]
    ];

    return view('admin.sos.list', compact('breadCrumbs', 'schemes'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $breadCrumbs = [
      [
        'label' => 'Sos',
        'url' => route('admin.sos.index')
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
      'subject_id' => 'required',
      'program_title' => 'required',
      'category' => 'required',
    ], [
      'subject_id.required' => 'Please Select a table first'
    ]);

    try {
      ProgramScheme::create([
        'subject_id' => $request->subject_id,
        'program_title' => ucwords($request->program_title),
        'courses' => $request->courses,
        'category' => $request->category
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
    $breadCrumbs = [
      [
        'label' => 'Sos',
        'url' => route('admin.sos.index')
      ],
      [
        'label' => 'Edit',
      ]
    ];
    $scheme = ProgramScheme::with('program')->findOrFail($id);
    $programs = Program::all(); // To populate the dropdown

    // return $scheme;


    return view('admin.sos.edit', [
      'scheme' => $scheme,
      'programs' => $programs,
      'breadCrumbs' => $breadCrumbs
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {

    $request->validate([
      'subject_id' => 'required',
      'program_title' => 'required',
      'category' => 'required'
    ], [
      'subject_id.required' => 'Please Select a table first'
    ]);

    try {
      ProgramScheme::where('id', $id)->update([
        'subject_id' => $request->subject_id,
        'program_title' => $request->program_title,
        'courses' => $request->courses,
        'category' => $request->category
      ]);

      return to_route('admin.sos.index')
        ->with('message', 'Record Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Insertion Failed' . $e->getMessage());
      return redirect()->back();
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}