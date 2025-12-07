<x-admin.layouts.master title="ttings | Edit">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row justify-content-end">
        <div class="col-sm-6">
          <x-admin.bread-crumbs :items="$breadCrumbs" />
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
              <div class="card-title">Settings</div>
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
            <x-base-form action="{{ route('admin.settings.update', $setting->id) }}" method="PUT" :media="true">
              <!--begin::Body-->
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="phone_no" class="form-label">Phone No</label> <span class="text-danger">*</span>
                    <input type="tel" class="form-control" id="phone_no" name="phone_no"
                      value="{{ old('phone_no', $setting->phone_no) }}" placeholder="+92 99 9999999" />
                  </div>

                  <div class="mb-3 col">
                    <label for="email" class="form-label">Email</label> <span class="text-danger">*</span>
                    <input type="email" class="form-control" id="email" name="email"
                      value="{{ old('email', $setting->email) }}" value="example@gmail.com" />
                  </div>

                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="logo" class="form-label">Logo</label> <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="logo" name="logo" />
                    <img id="preview" src="{{ asset('storage/admin/uploads/' . $setting->logo) }}" alt="image"
                      width="100" class="mt-2" />
                  </div>

                  <div class="mb-3 col">
                    <label for="copyrights" class="form-label">CopyRights</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" name="copyrights"
                      value="{{ old('copyrights', $setting->copyrights) }}" id="copyrights" />
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.settings') }}" class="btn btn-secondary">Back</a>

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
      logo.onchange = e => preview.src = URL.createObjectURL(e.target.files[0]);
    </script>

  @endpush
</x-admin.layouts.master>
