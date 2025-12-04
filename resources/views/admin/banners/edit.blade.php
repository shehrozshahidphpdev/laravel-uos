<x-admin.layouts.master title="admin-banners">
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
            <x-base-form action="{{ route('admin.banner.update', $banner->id) }}" method="PUT" :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="page" class="form-label">Page</label>
                    <select name="page" class="form-control" id="page">
                      <option disabled>Select a Page</option>

                      <option value="director-introduction" {{ old('page', $banner->page ?? '') == 'director-introduction' ? 'selected' : '' }}>
                        Introduction
                      </option>

                      <option value="director-chancellor-message" {{ old('page', $banner->page ?? '') == 'director-chancellor-message' ? 'selected' : '' }}>
                        Chancellor Message
                      </option>

                      <option value="director-vice-chancellor-message" {{ old('page', $banner->page ?? '') == 'director-vice-chancellor-message' ? 'selected' : '' }}>
                        Vice Chancellor Message
                      </option>

                      <option value="director-uni-map" {{ old('page', $banner->page ?? '') == 'director-uni-map' ? 'selected' : '' }}>
                        Uni Map
                      </option>

                      <option value="director-newsletter" {{ old('page', $banner->page ?? '') == 'director-newsletter' ? 'selected' : '' }}>
                        Newsletter
                      </option>

                      <option value="director-events" {{ old('page', $banner->page ?? '') == 'director-events' ? 'selected' : '' }}>
                        Events
                      </option>

                      <option value="director-news" {{ old('page', $banner->page ?? '') == 'director-news' ? 'selected' : '' }}>
                        News
                      </option>

                      <option value="director-academics" {{ old('page', $banner->page ?? '') == 'director-academics' ? 'selected' : '' }}>
                        Director Academics
                      </option>

                      <option value="director-estate-management" {{ old('page', $banner->page ?? '') == 'director-estate-management' ? 'selected' : '' }}>
                        Director Estate Management
                      </option>

                      <option value="director-graduate-studies" {{ old('page', $banner->page ?? '') == 'director-graduate-studies' ? 'selected' : '' }}>
                        Director Graduate Studies
                      </option>

                      <option value="director-it" {{ old('page', $banner->page ?? '') == 'director-it' ? 'selected' : '' }}>
                        Director IT
                      </option>

                      <option value="director-oric" {{ old('page', $banner->page ?? '') == 'director-oric' ? 'selected' : '' }}>
                        Director ORIC
                      </option>

                      <option value="director-planning-development" {{ old('page', $banner->page ?? '') == 'director-planning-development' ? 'selected' : '' }}>
                        Director Planning Development
                      </option>

                      <option value="director-project" {{ old('page', $banner->page ?? '') == 'director-project' ? 'selected' : '' }}>
                        Director Project
                      </option>

                      <option value="director-qec" {{ old('page', $banner->page ?? '') == 'director-qec' ? 'selected' : '' }}>
                        Director Quality Enhancement Cell
                      </option>

                      <option value="director-ro" {{ old('page', $banner->page ?? '') == 'director-ro' ? 'selected' : '' }}>
                        Director Resident Officer
                      </option>

                      <option value="director-dsa" {{ old('page', $banner->page ?? '') == 'director-dsa' ? 'selected' : '' }}>
                        Director Student Affairs
                      </option>

                      <option value="director-sports" {{ old('page', $banner->page ?? '') == 'director-sports' ? 'selected' : '' }}>
                        Director Sports
                      </option>

                      <option value="director-sustainability" {{ old('page', $banner->page ?? '') == 'director-sustainability' ? 'selected' : '' }}>
                        Director Sustainability
                      </option>

                      <option value="director-treasure-office" {{ old('page', $banner->page ?? '') == 'director-treasure-office' ? 'selected' : '' }}>
                        Director Treasure Office
                      </option>

                      <option value="director-controller-examination" {{ old('page', $banner->page ?? '') == 'director-controller-examination' ? 'selected' : '' }}>
                        Director Controller Examination
                      </option>

                      <option value="merit-list" {{ old('page', $banner->page ?? '') == 'merit-list' ? 'selected' : '' }}>
                        Merit List
                      </option>

                      <option value="contact-us" {{ old('page', $banner->page ?? '') == 'contact-us' ? 'selected' : '' }}>
                        Contact Us
                      </option>

                    </select>

                  </div>
                  <div class="mb-3 col">
                    <label for="banner" class="form-label">Banner</label>
                    <input type="file" class="form-control" id="banner" name="banner" value="" />
                    <img src="{{ asset('storage/admin/uploads/' . $banner->banner) }}" id="preview" width="100"
                      class="mt-2" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                      value="{{ old('title', $banner->title) }}" placeholder="e.g Latest News" />
                  </div>

                </div>
                <div class="row">

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
