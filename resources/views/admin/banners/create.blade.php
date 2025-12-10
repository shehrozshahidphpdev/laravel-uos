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
                  {{-- <div class="mb-3 col">
                    <label for="page" class="form-label">Page</label>
                    <select name="page" class="form-control" id="page">
                      <option selected disabled> Select a Page </option>

                      <option value="chancellor-message">Chancellor's Message</option>
                      <option value="introduction">Introduction</option>
                      <option value="registrar-office">Registrar's Office</option>
                      <option value="vc-office">Vice Chancellor's Office</option>
                      <option value="vice-chancellor-message">Vice Chancellor's Message</option>
                      <option value="time-table">TimeTable</option>
                      <option value="library">Library</option>
                      <option value="transport">Transportation</option>
                      <option value="hostel">Hostel</option>
                      <option value="sports">Sports</option>
                      <option value="plan9">Plan9</option>
                      <option value="courseera">DLSEI-COURSERA</option>

                      <option value="academics">Academics</option>
                      <option value="director-academics">Director of Academics</option>
                      <option value="graduate-studies">Director of Graduate Studies</option>
                      <option value="merit-list">Merit List</option>

                      <option value="cs">Computer Science</option>
                      <option value="ba">Business Administration</option>
                      <option value="commerce">Commerce</option>
                      <option value="economics">Economics</option>
                      <option value="english">English</option>
                      <option value="law">Law</option>
                      <option value="chemistry">Chemistry </option>
                      <option value="maths">Maths</option>
                      <option value="physics">Physics</option>
                      <option value="applied-physcology">Applied Physcology</option>

                      <option value="controller-examination">Director of Controller of Examinations</option>
                      <option value="dsa">Director of Student Affairs</option>
                      <option value="estate-management">Director of Estate Management</option>
                      <option value="it">Director of IT</option>
                      <option value="planning-development">Director of Planning & Development</option>
                      <option value="project">Director of Projects</option>
                      <option value="qec">Director of Quality Enhancement Cell</option>
                      <option value="ro">Director of Resident Officer</option>
                      <option value="sports">Director of Sports</option>
                      <option value="sustainability">Director of Sustainability</option>
                      <option value="treasure-office">Director of Treasury Office</option>

                      <option value="oric">Director of ORIC</option>
                      <option value="oric-partner">ORIC Partners</option>
                      <option value="oric-publications">ORIC Publications</option>
                      <option value="oric-publications-summary">ORIC Publications Summary</option>
                      <option value="oric-team">ORIC Team</option>

                      <option value="contact-us">Contact Us</option>
                      <option value="dsa-downloads">DSA Downloads</option>
                      <option value="events">Events</option>
                      <option value="newsletter">Newsletter</option>
                      <option value="news">News</option>
                      <option value="uni-map">University Map</option>
                      <option value="downloads">Downloads</option>
                      <option value="notifications">Notifications</option>
                      <option value="scholarship">Scholarship</option>
                      <option value="prospectus">Prospectus</option>
                      <option value="how-to-apply">How To Apply</option>

                      <option value="qec">QEC</option>
                    </select>

                  </div> --}}
                  <div class="mb-3 col">
                    <label for="banner" class="form-label">Banner</label>
                    <input type="file" class="form-control" id="banner" name="banner" value="" />
                    <img id="preview" width="100" class="mt-2" />
                  </div>
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
