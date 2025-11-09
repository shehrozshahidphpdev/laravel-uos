<x-admin.layouts.master>
  <x-slot:title>
    Admin News Create
  </x-slot:title>
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">News / Create</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">News</li>
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
        <div class="row col-md-12">
          <!--begin::Quick Example-->
          <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
              <div class="card-title">News</div>
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
            <x-base-form action="{{ route('admin.news.store') }}" :media="true">
              <!--begin::Body-->
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="title" class="form-label">Title & Slug</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title"
                      value="{{ old('title', '') }}" />
                  </div>
                  <div class="mb-3 col">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="" />
                    <img id="preview" width="100" class="mt-2" />
                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col">
                    <label for="description" class="form-label">Description</label> <span class="text-danger">*</span>
                    <textarea class="form-control" id="description" name="description"
                      placeholder="Enter Text Here....">{{ old('description', '') }}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="d-flex justify-content-between mb-3">
                    <label class="form-label fw-semibold">Additional</label>
                    <button type="button" class="btn btn-success btn-sm" id="add-field" title="Add More Fields">
                      <i class="bi bi-plus-circle mx-2"></i>Add More Fields
                    </button>
                  </div>
                  <div class="additional-wrapper">
                    <div class="d-flex gap-2 mb-2 additional-group w-100">
                      <!-- Key field -->
                      <div class="flex-grow-1 d-flex align-items-end gap-2">
                        <label class="form-label mb-1" for="key">Key:</label>
                        <input type="text" class="form-control" name="additional_info[1][key]" />
                      </div>

                      <!-- Value field + Add button -->
                      <div class="flex-grow-1 d-flex align-items-end gap-2">
                        <label class="form-label mb-1" for="key">Val:</label>
                        <input type="text" class="form-control" name="additional_info[1][val]" />
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.news') }}" class="btn btn-secondary">Cancel</a>
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

        let index = $('.additional-group').length;
        console.log(index);
        $('#add-field').on('click', function (e) {
          e.preventDefault();
          // gives the indxes to the newly appended fields to make a proper php array
          index++;
          $('.additional-wrapper').append(`
                <div class="d-flex gap-2 mb-2 additional-group w-100">
                      <!-- Key field -->
                  <div class="flex-grow-1 d-flex align-items-end gap-2">
                    <label class="form-label mb-1" for="key">Key:</label>
                    <input type="text" class="form-control" name="additional_info[${index}][key]" />
                  </div>
                  <!-- Value field + Add button -->
                  <div class="flex-grow-1 d-flex align-items-end gap-2">
                    <label class="form-label mb-1" for="key">Val:</label>
                    <input type="text" class="form-control" name="additional_info[${index}][val]" />
                    <button type="button" class="btn btn-danger btn-sm" id="remove-field" title="remove field">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </div>
                                                  `)
        });
        $(document).on('click', '#remove-field', function (e) {
          e.preventDefault();
          $(this).closest('.additional-group').remove();
        });
      });
      image.onchange = e => preview.src = URL.createObjectURL(e.target.files[0]);


    </script>
  @endpush
</x-admin.layouts.master>
