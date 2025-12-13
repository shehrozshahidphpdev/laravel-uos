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
              <div class="card-title">Chairman Profile</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.faculty-profiles.update', $profile->id) }}" method="PUT" :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $profile->name) }}"
                      placeholder="Enter Chairman Name" />
                  </div>
                  <div class="mb-3 col">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" name="designation"
                      value="{{ old('designation', $profile->designation) }}" placeholder="Enter Designation" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="position" class="form-label">Position</label>
                    <textarea id="position" name="position" rows="4" cols="36" placeholder="Enter Position  here..."
                      class="form-control">
                    {{ old('position', $profile->position) }}
                  </textarea>
                  </div>
                  <div class="mb-3 col">
                    <label for="qualification" class="form-label">Qualification</label>
                    <textarea id="qualification" name="qualification" rows="4" cols="36"
                      placeholder="Enter Qualifications  here..."
                      class="form-control">{{ old('qualification', $profile->qualification) }}</textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="specialization" class="form-label">Specialization</label>
                    <input type="text" class="form-control" name="specialization"
                      value="{{ old('specialization', $profile->specialization) }}"
                      placeholder="Enter Specialization" />
                  </div>
                  <div class="mb-3 col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $profile->email) }}"
                      placeholder="Enter Email" />
                  </div>
                </div>
                <div class="row">
                  <!-- CV Upload -->
                  <div class="mb-3 col">
                    <label for="cv" class="form-label">Upload CV</label>
                    <input type="file" class="form-control" id="cv" name="cv" accept=".pdf,.doc,.docx">
                    <!-- CV Preview -->
                    <iframe id="cvPreview" class="mt-2" width="100%" height="300"
                      style="display:none; border:1px solid #ddd;"></iframe>
                  </div>
                  <div class="mb-3 col">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" />
                    <img id="preview" src="{{ asset('storage/admin/uploads/' . $profile->image) }}" width="100"
                      class="mt-2" />
                  </div>
                </div>
                <div class="row">
                  {{-- Department --}}
                  <div class="mb-3 col">
                    <label class="form-label">Department</label>
                    <select name="dept_id" class="form-select">
                      <option disabled>Select a Department</option>

                      @forelse($departments as $department)
                        <option value="{{ $department->id }}" {{ $profile->dept_id == $department->id ? 'selected' : '' }}>
                          {{ ucwords($department->dept_name) }}
                        </option>
                      @empty
                        <option disabled>Sorry No Data Found!</option>
                      @endforelse
                    </select>
                  </div>

                  {{-- Category --}}
                  <div class="mb-3 col">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                      <option disabled>Select a Category</option>

                      <option value="faculty" {{ $profile->category == 'faculty' ? 'selected' : '' }}>
                        Faculty
                      </option>

                      <option value="chairman" {{ $profile->category == 'chairman' ? 'selected' : '' }}>
                        Chairman
                      </option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.faculty-profiles.index') }}" class="btn btn-secondary">Cancel</a>
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
