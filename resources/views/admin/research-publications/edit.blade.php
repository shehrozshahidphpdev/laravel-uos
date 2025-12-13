<x-admin.layouts.master title="Admin | chairman profile">
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
              <div class="card-title">Research Publications</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.research-publications.update', $publication->id) }}" method="PUT">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="authors" class="form-label">Authors</label>
                    <textarea id="authors" name="authors" rows="4" cols="36" placeholder="Enter Authors  here..."
                      class="form-control">
                      {{ old('authors', $publication->authors) }}
                    </textarea>
                  </div>
                  <div class="mb-3 col">
                    <label for="title" class="form-label">Title</label>
                    <textarea id="title" name="title" rows="4" cols="36" placeholder="Enter Title  here..."
                      class="form-control">
                      {{ old('title', $publication->title) }}</textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="journal" class="form-label">Journal</label>
                    <textarea id="journal" name="journal" rows="4" cols="36" placeholder="Enter Journal  here..."
                      class="form-control">
                           {{ old('journal', $publication->journal) }}</textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" name="category"
                      value="{{ old('category', $publication->category) }}" placeholder="Enter Year" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="year" class="form-label">Year</label>
                    <input type="text" class="form-control" name="year" value="{{ old('year', $publication->year) }}"
                      placeholder="e.g 2022" />
                  </div>
                  <div class="mb-3 col">
                    <label for="impact_factor" class="form-label">Impact Factor</label>
                    <input type="text" class="form-control" name="impact_factor"
                      value="{{ old('impact_factor', $publication->impact_factor) }}" placeholder="Enter Email" />
                  </div>
                </div>
                <div class="mb-3 col">
                  <label for="department" class="form-label">Department</label>
                  <select name="dept_id" class="form-select">
                    <option selected disabled>Select a Department</option>
                    @forelse($departments as $department)
                      <option value="{{ $department->id }}" {{ $publication->dept_id == $department->id ? 'selected' : '' }}>
                        {{ ucwords($department->dept_name) }}
                      </option>
                    @empty
                      <option>Sorry No Data Found!</option>
                    @endforelse
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.research-publications.index') }}" class="btn btn-secondary">Cancel</a>
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
      cv.onchange = e => {
        cvPreview.src = URL.createObjectURL(e.target.files[0]);
        cvPreview.style.display = "block";
      };
    </script>
  @endpush
</x-admin.layouts.master>
