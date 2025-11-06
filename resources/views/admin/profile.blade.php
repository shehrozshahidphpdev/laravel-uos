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
          <h3 class="mb-0">Admin / Profile</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
        <div class="row col-md-8">
          <!--begin::Quick Example-->
          <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
              <div class="card-title">Profile</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <x-base-form id="profileForm">
              <!--begin::Body-->
              <input type="hidden" id="editId" value="">
              <div class="card-body">
                <div class="mb-3">
                  <label for="first_name" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="first_name" value="" />
                </div>

                <div class="mb-3">
                  <label for="last_name" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="last_name" value="" />
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" value="email" />
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">New Password</label>
                  <input type="password" class="form-control" id="password" />
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        function loadProfile() {
          let action = "{{ route('admin.getProfile') }}";

          $.ajax({
            url: action,
            dataType: 'json',
            success: function (res) {
              console.log(res);
              $('#editId').val(res.id);
              $('#first_name').val(res.first_name);
              $('#last_name').val(res.last_name);
              $('#email').val(res.email);
            }
          })
        }

        $('#profileForm').on('submit', function (e) {
          e.preventDefault();
          let action = "{{ route('admin.edit-profile') }}";
          console.log(action);
          $.ajax({
            url: action,
            type: 'post',
            dataType: 'json',
            data: {
              id:
                first_name: $('#first_name').val(),
              last_name: $('#last_name').val(),
              email: $('#email').val(),
              password: $('#password').val()
            },
            success: function (res) {
              console.log(res);
            },
            error: function (xhr) {
              console.log(xhr);
            }
          })
        });

        loadProfile();
      });
    </script>
  @endpush
</x-admin.layouts.master>
