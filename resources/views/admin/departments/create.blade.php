<x-admin.layouts.master>
  <x-slot:title>
    Admin | Home-page
  </x-slot:title>
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Department / Create</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Depratment</li>
          </ol>
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
      {{-- main body cntent goes here --}}
      <!--begin::Row-->
      <div class="row justify-content-center">
        <div class="row col-md-10">
          <!--begin::Quick Example-->
          <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
              <div class="card-title">Departments</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            @if ($errors->any())
              <script>
                document.addEventListener("DOMContentLoaded", function () {
                  @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                  @endforeach
                          });
              </script>
            @endif

            <x-base-form action="{{ route('admin.departments.store') }}" :media="true">
              <!--begin::Body-->
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
            <!--end::Form-->
          </div>
          <!--end::Quick Example-->
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
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
