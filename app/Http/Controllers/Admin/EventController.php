<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\fileExists;

class EventController extends Controller
{
  public function index()
  {
    $breadcrumbs = [];
    $breadcrumbs = [
      [
        'label' => 'Events',
      ],
    ];

    $events = Event::all();
    return view(
      'admin.events.list',
      ['breadcrumbs' => $breadcrumbs, 'events' => $events]
    );
  }

  public function create()
  {
    $breadcrumbs = [];
    $breadcrumbs = [
      [
        'url' => route('admin.events'),
        'label' => 'Events',
      ],
      [
        'label' => 'Create',
      ]
    ];
    return view(
      'admin.events.create',
      ['breadCrumbs' => $breadcrumbs]
    );
  }

  public function store(Request $request)
  {
    $request->merge([
      'slug' => Str::slug($request->title)
    ]);

    $request->validate([
      'title' => 'required|min:4',
      'poster' => 'required|mimes:png,jpg,jpeg|max:5048',
      'slug' => 'required|unique:events,slug',
    ]);

    try {
      $posterName = null;
      if ($request->hasFile('poster')) {
        $poster = $request->file('poster');
        $posterName = time() . '_' . uniqid() . '_' . $poster->getClientOriginalName();
        $poster->storeAs('admin/uploads/', $posterName, 'public');
      }
      $dbExtraIamges = [];

      if ($request->hasFile('images')) {
        $extraImages = [];
        $extraImages = $request->file('images');
        foreach ($extraImages as $extraImage) {
          $extraImageName = time() . '_' . uniqid() . '_' . $extraImage->getClientOriginalName();
          $extraImage->storeAs('admin/uploads/', $extraImageName, 'public');
          $dbExtraIamges[] = $extraImageName;
        }
      }

      Event::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'poster' => $posterName,
        'description' => $request->description,
        'created_by' => Auth::user()->id,
        'images' => $dbExtraIamges ?? null
      ]);
      return to_route('admin.events')
        ->with('message', 'Event Created Successfully');
    } catch (\Exception $e) {
      Log::error('Action Failed' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try Again');
    }
  }

  public function edit(string $id)
  {
    $breadcrumbs = [
      [
        'label' => 'Events',
        'url' => route('admin.events')
      ],
      [
        'label' => 'Edit'
      ]
    ];

    $event = Event::where('id', $id)->first();
    return view(
      'admin.events.edit',
      ['event' => $event, 'breadCrumbs' => $breadcrumbs]
    );
  }

  public function update(Request $request, string $id)
  {
    $event = Event::findOrFail($id);

    $request->merge([
      'slug' => Str::slug($request->title),
    ]);

    $request->validate([
      'title' => 'required|min:4',
      'poster' => 'nullable|mimes:png,jpg,jpeg|max:5048',
      'slug' => 'required|unique:events,slug,' . $id,
    ]);

    try {
      $posterName = $event->poster;

      if ($request->hasFile('poster')) {
        $oldPosterPath = storage_path('app/public/admin/uploads/' . $event->poster);
        if (file_exists($oldPosterPath)) {
          @unlink($oldPosterPath);
        }
        // save new poster
        $poster = $request->file('poster');
        $posterName = time() . '_' . uniqid() . '_' . $poster->getClientOriginalName();
        $poster->storeAs('admin/uploads/', $posterName, 'public');
      }
      $dbExtraImages = $event->images; // keep old by default
      if ($request->hasFile('images')) {
        // delete all old extra images
        if (!empty($event->images)) {
          foreach ($event->images as $oldImg) {
            $imgPath = storage_path('app/public/admin/uploads/' . $oldImg);
            if (file_exists($imgPath)) {
              @unlink($imgPath);
            }
          }
        }
        // save new images
        $dbExtraImages = [];
        foreach ($request->file('images') as $image) {
          $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
          $image->storeAs('admin/uploads/', $imageName, 'public');
          $dbExtraImages[] = $imageName;
        }
      }

      $event->update([
        'title'       => $request->title,
        'slug'        => $request->slug,
        'poster'      => $posterName,
        'description' => $request->description,
        'images'      => $dbExtraImages,
        'created_by'  => Auth::id(),
      ]);

      return to_route('admin.events')->with('message', 'Record Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Update Failed: ' . $e->getMessage());

      return back()->with('message', 'Something went wrong. Please try again.');
    }
  }


  public function delete(Request $request)
  {
    $id = $request->id;

    try {
      $event = Event::findOrFail($id);
      $image = Storage_path('app/public/admin/uploads/' . $event->poster);
      if (file_exists($image)) {
        @unlink($image);
      }
      foreach ($event->images as $extraImage) {
        $localExtraImage = storage_path('app/public/admin/uploads/' . $extraImage);
        if (file_exists($localExtraImage)) {
          @unlink($localExtraImage);
        }
      }

      $event->delete();
      return response()->json([
        'message' => "Record Deleted Successfully",
      ], 200);
    } catch (\Exception $e) {
      Log::error('Action Failed: ' . $e->getMessage());
      return response()->json([
        'error' => "Something Went Wrong Please Try Again",
      ], 500);
    }
  }
}
