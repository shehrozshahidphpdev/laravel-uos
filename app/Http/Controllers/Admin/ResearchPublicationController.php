<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Department;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\ResearchPublication;

class ResearchPublicationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $publications = ResearchPublication::with('department')->get();

    // return $publications;
    $breadCrumbs = [
      [
        'label' => 'reserach Publications'
      ]
    ];

    return view('admin.research-publications.list', compact(
      'breadCrumbs',
      'publications'
    ));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $departments = Department::all();

    $breadCrumbs = [
      [
        'label' => 'Programs',
        'url' => route('admin.research-publications.index')
      ],
      [
        'label' => 'Create'
      ]
    ];

    return view('admin.research-publications.create', compact('breadCrumbs', 'departments'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // dd($request->all());

    $data = $request->validate([
      'authors' => 'required|unique:programs,subject',
      'title' => 'required',
      'journal' => 'required',
      'category' => 'required',
      'year' => 'required|numeric',
      'impact_factor' => 'required',
      'dept_id' => 'required|numeric',
    ]);


    try {
      ResearchPublication::create($data);
      return to_route('admin.research-publications.index')
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
    $departments = Department::all();
    $breadCrumbs = [
      [
        'label' => 'Resersch Publications',
        'url' => route('admin.research-publications.index')
      ],
      [
        'label' => 'Edit'
      ]
    ];
    return view('admin.research-publications.edit', [
      'publication' => ResearchPublication::findOrFail($id),
      'breadCrumbs' => $breadCrumbs,
      'departments' => $departments
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // dd($request->all());

    $data = $request->validate([
      'authors' => 'required|unique:programs,subject',
      'title' => 'required',
      'journal' => 'required',
      'category' => 'required',
      'year' => 'required|numeric',
      'impact_factor' => 'required',
      'dept_id' => 'required|numeric',
    ]);
    try {
      ResearchPublication::where('id', $id)->update($data);
      return to_route('admin.research-publications.index')
        ->with('message', 'Record Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Updation Failed: ' . $e->getMessage());
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
      $data = ResearchPublication::findOrFail($id);
      $data->delete();

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