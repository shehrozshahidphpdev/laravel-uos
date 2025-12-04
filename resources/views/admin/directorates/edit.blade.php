<x-admin.layouts.master>
  <x-slot:title>
    Admin | Directorates
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
              <div class="card-title">Directorates</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.directorate.update', $directorate->id) }}" method="PUT" :media="true">
              <input type="hidden" name="module" value="directorates">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                      value="{{ old('name', $directorate->name ?? '') }}" placeholder="John Doe" />
                  </div>
                  <div class="mb-3 col">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="" />
                    <img src="{{ asset('storage/admin/uploads/' . $directorate->image ?? '') }}" id="preview"
                      width="100" class="mt-2" alt="Image" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation"
                      value="{{ old('designation', $directorate->designation) }}" placeholder="Engineer..." />
                  </div>

                  <div class="mb-3 col">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                      value="{{ old('email', $directorate->email) }}" placeholder="johndoe@example.com" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="phone_no" class="form-label">Phone No</label>
                    <input type="phone" class="form-control" id="phone_no" name="phone_no"
                      value="{{ old('phone_no', $directorate->phone_no) }}" placeholder="+92 xxxxxxxxxx" />
                  </div>
                  <div class="mb-3 col">
                    <label for="page" class="form-label">Page</label>
                    <select name="page" class="form-control">
                      <option selected disabled>Select a Page</option>

                      <option {{ $directorate->page == 'academics' ? 'selected' : '' }} value="academics">
                        Academics
                      </option>

                      <option {{ $directorate->page == 'estate-management' ? 'selected' : '' }} value="estate-management">
                        Estate Management
                      </option>

                      <option {{ $directorate->page == 'graduate-studies' ? 'selected' : '' }} value="graduate-studies">
                        Graduate Studies
                      </option>

                      <option {{ $directorate->page == 'information-technology' ? 'selected' : '' }}
                        value="information-technology">
                        Information Technology
                      </option>

                      <option {{ $directorate->page == 'oric' ? 'selected' : '' }} value="oric">
                        ORIC
                      </option>

                      <option {{ $directorate->page == 'planning-development' ? 'selected' : '' }}
                        value="planning-development">
                        Planning And Development
                      </option>

                      <option {{ $directorate->page == 'project-director' ? 'selected' : '' }} value="project-director">
                        Project Director
                      </option>

                      <option {{ $directorate->page == 'qec' ? 'selected' : '' }} value="qec">
                        Quality Enhancement Cell
                      </option>

                      <option {{ $directorate->page == 'resident-officer' ? 'selected' : '' }} value="resident-officer">
                        Resident Officer
                      </option>

                      <option {{ $directorate->page == 'student-affairs' ? 'selected' : '' }} value="student-affairs">
                        Student Affairs
                      </option>

                      <option {{ $directorate->page == 'sports' ? 'selected' : '' }} value="sports">
                        Sports
                      </option>

                      <option {{ $directorate->page == 'sustainability' ? 'selected' : '' }} value="sustainability">
                        Sustainability
                      </option>
                    </select>

                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.directorates') }}" class="btn btn-secondary">Cancel</a>
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
