<x-admin.layouts.master title="Admin | Downloads | Create">
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
              <div class="card-title">Downloads</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.downloads.update', $download->id) }}" method="PUT" :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                      value="{{ old('title', $download->title) }}" placeholder="Enter Title" />
                  </div>
                  <div class="mb-3 col">
                    <label for="file" class="form-label">File</label>
                    <input type="file" class="form-control" id="file" name="file" />
                    <iframe src="{{ asset('storage/admin/uploads/' . $download->file) }}" id="preview" width="100"
                      class="mt-2"> </iframe>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col">
                    <label for="page" class="form-label">Page</label>
                    <select name="page" class="form-control">
                      <option selected disabled>Select a Page</option>
                      <option value="forms">Forms</option>
                      <option value="notifications">Notifications</option>
                      <option value="prospectus">Prospectus</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.downloads.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </x-base-form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    <script>
      document.getElementById('file').onchange = e => {
        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
      };


    </script>
  @endpush
</x-admin.layouts.master>
