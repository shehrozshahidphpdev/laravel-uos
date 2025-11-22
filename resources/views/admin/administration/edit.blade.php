<x-admin.layouts.master>
  <x-slot:title>
    Admin | Administration
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
              <div class="card-title">Administratins</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.administration.update', $administration->id) }}" method="PUT"
              :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                      value="{{ old('name', $administration->name) }}" placeholder="John Doe" />
                  </div>
                  <div class="mb-3 col">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="" />
                    <img id="preview" src="{{ asset('storage/admin/uploads/' . $administration->image) }}" width="100"
                      class="mt-2" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="phone_no" class="form-label">Phone No</label>
                    <input type="phone" class="form-control" id="phone_no" name="phone_no"
                      value="{{ old('phone_no', $administration->phone_no) }}" placeholder="+92 xxxxxxxxxx" />
                  </div>
                  <div class="mb-3 col">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                      value="{{ old('email', $administration->email) }}" placeholder="johndoe@example.com" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation"
                      value="{{ old('designtion', $administration->designation) }}" placeholder="Engineer..." />
                  </div>
                  <div class="mb-3 col">
                    <label for="page" class="form-label">Page</label>
                    <select name="page" class="form-control">
                      <option selected disabled> Select a Page </option>
                      <option value="vice-chancellor-office" {{ $administration->page == 'vice-chancellor-office' ? 'selected' : '' }}>
                        VC Office</option>
                      <option value="registrar-office" {{ $administration->page == 'registrar-office' ? 'selected' : '' }}>
                        Registrar Office</option>
                      <option value="treasure-office" {{ $administration->page == 'treasure-office' ? 'selected' : '' }}>
                        Treasure Office</option>
                      <option value="controller-examination" {{ $administration->page == 'controller-examination' ? 'selected' : '' }}>
                        Controller Examination</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.administrations') }}" class="btn btn-secondary">Cancel</a>
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