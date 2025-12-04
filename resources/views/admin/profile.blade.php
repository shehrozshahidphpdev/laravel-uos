<x-admin.layouts.master>
  <x-slot:title>
    Admin | Profile
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
      <div class="row justify-content-center">
        <div class="row col-md-10">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Profile</div>
            </div>
            <x-base-form action="{{ route('admin.getProfile') }}" id="profileForm">
              <input type="hidden" id="editId" value="">
              <div class="card-body">
                <div class="row">

                  <div class="mb-3 col">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" value="" />
                  </div>

                  <div class="mb-3 col">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" value="" />
                  </div>

                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" value="email" />
                  </div>

                  <div class="mb-3 col">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" />
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </x-base-form>
            <!--end::Form-->
          </div>
        </div>
      </div>
    </div>
  </div>
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
          $.ajax({
            url: action,
            type: 'post',
            dataType: 'json',
            data: {
              id: $('#editId').val(),
              first_name: $('#first_name').val(),
              last_name: $('#last_name').val(),
              email: $('#email').val(),
              password: $('#password').val()
            },
            success: function (res) {
              // render content on the header
              $('#user_name').text('Welcome ' + res.user);
              $('#card_user_name').text(res.user);

              toastr.success(res.message);
              loadProfile();
            },
            error: function (xhr) {
              if (xhr.status === 500) {
                console.log(xhr.responseJSON.message);
              }
              toastr.error(xhr.message);
            }
          })
        });

        loadProfile();
      });
    </script>
  @endpush
</x-admin.layouts.master>
