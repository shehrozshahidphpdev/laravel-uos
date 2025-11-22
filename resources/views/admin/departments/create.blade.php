<x-admin.layouts.master>
  <x-slot:title>
    Admin | Home-page
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
        <div class="row col-md-10">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Departments</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.departments.store') }}" :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="dept_name" class="form-label">Depratment Name</label>
                    <input type="text" class="form-control" id="dept_name" name="dept_name"
                      value="{{ old('dept_name') }}" />
                  </div>
                  <div class="mb-3 col">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="" />
                    <img id="preview" width="100" class="mt-2" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3">
                    <label for="course" class="form-label fw-semibold">Courses</label>
                    <div id="course-wrapper">
                      <div class="d-flex flex-wrap align-items-center gap-2 mb-2 course-group">
                        <div class="input-group">
                          <input type="text" class="form-control" name="offered_courses[]"
                            placeholder="Enter course name" />
                          <button type="button" class="btn btn-sm btn-success" id="add-field" title="Add More Fields">
                            <i class="bi bi-plus-circle"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.departments') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </x-base-form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    <script>
      $(document).ready(function () {
        $('#add-field').on('click', function (e) {
          e.preventDefault();
          console.log('Hello');
          $('.course-group').append(`
                                        <div class="input-group">
                                          <input type="text" class="form-control" name="offered_courses[]" placeholder="Enter course name" />
                                          <button type="button" class="btn btn-sm btn-danger" id="remove-field" title="remove field">
                                            <i class="bi bi-trash"></i>
                                          </button>
                                        </div>`)
        });
        $(document).on('click', '#remove-field', function (e) {
          e.preventDefault();
          $(this).closest('.input-group').remove();
        });
      });
      image.onchange = e => preview.src = URL.createObjectURL(e.target.files[0]);
    </script>
  @endpush
</x-admin.layouts.master>
