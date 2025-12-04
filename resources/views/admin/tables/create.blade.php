<x-admin.layouts.master>
  <x-slot:title>
    Admin | Tables
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
      <div class="row justify-content-center">
        <div class="row col-md-12">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Table</div>
            </div>
            <x-admin.session-message />

            <x-base-form action="{{ route('admin.tables.store') }}" :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="title" class="form-label">Table Name</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', '') }}"
                      placeholder="Enter Table Name Here..." />
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('admin.tables.index') }}" class="btn btn-secondary">Back</a>
              </div>
            </x-base-form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    <script>
      logo.onchange = e => preview.src = URL.createObjectURL(e.target.files[0]);
    </script>

  @endpush
</x-admin.layouts.master>