<x-admin.layouts.master>
  <x-slot:title>
    Admin News Edit
  </x-slot:title>
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row justify-content-end">
        <div class="col-sm-6">
          <x-admin.bread-crumbs :items="$breadCrumbs" />
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      {{-- main body cntent goes here --}}
      <!--begin::Row-->
      <div class="row justify-content-center">
        <div class="row col-md-12">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">News</div>
            </div>
            @if ($errors->any())
              <script>
                document.addEventListener("DOMContentLoaded", function () {
                  @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                  @endforeach
                                                                                                                                                                  });
              </script>
            @endif
            <x-base-form action="{{ route('admin.news.update', $news->id) }}" :media="true" method="PUT">
              <!--begin::Body-->
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="title" class="form-label">Title & Slug</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title"
                      value="{{ old('title', $news->title) }}" />
                  </div>
                  <div class="mb-3 col">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="" />
                    <img id="preview" src="{{ asset('storage/admin/uploads/' . $news->image) }}" width="100"
                      class="mt-2" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="tinymce-editor" class="form-label">Description</label>
                    <textarea class="editor" id="tinymce-editor" name="description">
                       {!! $news->description !!}
                    </textarea>
                  </div>
                </div>
              </div>
              <!-- Hidden File Input for Images (Multiple Files) -->
              <input type="file" name="images[]" id="tinymce-file-input" multiple accept="image/*"
                style="display:none;">
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.news') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </x-base-form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    <script>
      image.onchange = e => preview.src = URL.createObjectURL(e.target.files[0]);
    </script>
  @endpush
</x-admin.layouts.master>
