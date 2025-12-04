<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\OricPublication;

class OricPublicationController extends Controller
{
  public function index()
  {
    $data = OricPublication::all();

    $breadCrumbs = [
      [
        'label' => 'Oric Publications',
      ]
    ];

    return view('admin.oricpublications.list', [
      'breadcrumbs' => $breadCrumbs,
      'oricPublications' => $data
    ]);
  }
  public function create()
  {

    $breadCrumbs = [
      [
        'label' => 'Oric Publications',
        'url' => route('admin.oric-publication')
      ],
      [
        'label' => 'Create'
      ]
    ];

    return view('admin.oricpublications.create', [
      'breadCrumbs' => $breadCrumbs,
    ]);
  }
  public function store(Request $request)
  {
    // dd($request->all());
    $data = $request->validate([
      'name' => 'required|min:3',
      'rank' => 'required|min:3',
      'department' => 'required|min:4',
      'category' => 'required|min:4',
      'title' => 'required|min:4',
      'journal' => 'required|min:4',
      'year' => 'required|numeric',
      'if' => 'required',
      'authors' => 'nullable'
    ]);

    try {
      OricPublication::create($data);
      return to_route('admin.oric-publication')
        ->with('message', 'Record Created Successfully');
    } catch (\Exception $e) {
      Log::error('Action Failed: ' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try again');
    }
  }
  public function edit(Request $request, string $id)
  {

    $data = OricPublication::findOrFail($id);
    // dd($data);
    $breadCrumbs = [
      [
        'label' => 'Oric Publications',
        'url' => route('admin.oric-publication')
      ],
      [
        'label' => 'Edit'
      ]
    ];

    return view('admin.oricpublications.edit', [
      'breadCrumbs' => $breadCrumbs,
      'oricPublication' => $data
    ]);
  }
  public function update(Request $request, string $id)
  {

    $data = $request->validate([
      'name' => 'required|min:3',
      'rank' => 'required|min:3',
      'department' => 'required|min:4',
      'category' => 'required|min:4',
      'title' => 'required|min:4',
      'journal' => 'required|min:4',
      'year' => 'required|numeric',
      'if' => 'required',
      'authors' => 'nullable'
    ]);

    try {
      OricPublication::where('id', $id)->update($data);
      return to_route('admin.oric-publication')
        ->with('message', 'Record Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Updation Failed: ' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try again');
    }
  }
  public function delete(string $id)
  {
    try {
      $data = OricPublication::findOrFail($id);
      $data->delete();
      return response()->json([
        'message' => 'Record Deleted Successfully',
      ], 200);
    } catch (\Exception $e) {
      Log::error('Seletion Failed: ' . $e->getMessage());
      return response()->json([
        'message' => 'SomeThing Went Wrong Please Try Again',
      ], 200);
    }
  }
}