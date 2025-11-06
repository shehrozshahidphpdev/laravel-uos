@extends('admin.auth.master')
@section('title', 'Admin | Register')
@section('main-content')
  <div class="register-box">
    <!-- /.register-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header">
        <p href="../index2.html" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
        <h1 class="mb-0 text-center"><b>Register</b></h1>
        </p>
      </div>
      <div class="card-body register-card-body">
        <p class="register-box-msg">Register a new membership</p>

        <x-base-form action="{{ route('auth.attempt-register') }}" id="registerForm">
          <div class="input-group mb-1">
            <div class="form-floating">
              <input type="text" id="first_name" class="form-control" />
              <label for="name">First Name</label>
            </div>
            <div class="input-group-text">
              <span class="bi bi-person"></span>
            </div>
          </div>
          <div class="input-group mb-1">
            <div class="form-floating">
              <input type="text" id="last_name" class="form-control" />
              <label for="name">Last Name</label>
            </div>
            <div class="input-group-text">
              <span class="bi bi-person"></span>
            </div>
          </div>
          <div class="input-group mb-1">
            <div class="form-floating">
              <input type="email" id="email" class="form-control" />
              <label for="email">Email</label>
            </div>
            <div class="input-group-text">
              <span class="bi bi-envelope"></span>
            </div>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="password" type="password" id="password" class="form-control" />
              <label for="password"> Password</label>
            </div>
            <div class="input-group-text">
              <span class="bi bi-lock-fill"></span>
            </div>
          </div>
          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="password_confirmation" id="password" name="password_confirmation" class="form-control" />
              <label for="password_confirmation">Confirm Password</label>
            </div>
            <div class="input-group-text">
              <span class="bi bi-lock-fill"></span>
            </div>
          </div>
          <!--begin::Row-->
          <div class="row justify-content-end mt-2">
            <!-- /.col -->
            <div class="col-4">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
        </x-base-form>
        <!-- /.social-auth-links -->

        <p class="mb-0">
          <a href="{{ route('auth.login') }}" class="link-primary text-center"> I already have a membership </a>
        </p>
      </div>
      <!-- /.register-card-body -->
    </div>
  </div>

@endsection
@push('script')
  <script>
    $(document).ready(function () {
      // ---- 1. Set the header *after* the DOM is ready ----
      const csrfToken = $('meta[name="csrf-token"]').attr('content');
      if (!csrfToken) {
        console.error('CSRF token meta tag not found or empty');
      } else {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': csrfToken
          }
        });
      }

      $('#registerForm').on('submit', function (e) {
        e.preventDefault();

        let firstName = $('#first_name').val();
        let lastName = $('#last_name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let passwordConfirmation = $('#password_confirmation').val();
        let action = $(this).attr('action');

        $.ajax({
          url: action,
          type: 'POST',
          dataType: 'JSON',
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            first_name: firstName,
            last_name: lastName,
            email: email,
            password: password,
            password_confirmation: passwordConfirmation
          },
          success: function (res) {
            if (res.status === 422) {
              if (res.errors.first_name) {
                toastr.error(res.errors.first_name);
              }
              if (res.errors.last_name) {
                toastr.error(res.errors.last_name);
              }
              if (res.errors.email) {
                toastr.error(res.errors.email);
              }
              if (res.errors.password) {
                toastr.error(res.errors.password);
              }
            } else if (res.status === 200) {
              toastr.success('User Registered Successfully');
              window.location.href = "{{ route('auth.login') }}";
            }
          },
          error: function (error, xhr) {
            console.log(xhr);
            console.log(error);
          }
        })
      })
    })

  </script>
@endpush
