<x-admin.layouts.master title="Admin | Banner | Create">
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
      <div class="row justify-content-center">
        <div class="row col-md-12">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Banner</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.banner.store') }}" :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="banner" class="form-label">Banner</label>
                    <input type="file" class="form-control" id="banner" name="banner" value="" />
                    <img id="preview" width="100" class="mt-2" />
                  </div>
                  <div class="mb-3 col">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                      placeholder="example: how are you" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                      placeholder="example: latest news" />
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.banners') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </x-base-form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      banner.onchange = e => preview.src = URL.createObjectURL(e.target.files[0]);
    </script>
  @endpush
</x-admin.layouts.master>
