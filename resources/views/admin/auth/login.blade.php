@extends('admin.auth.master')
@section('title', 'Admin | Login')
@section('main-content')

  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1 class="mb-0 "><b>Login</b></h1>
      </div>
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <x-base-form action="{{ route('auth.attempt-login') }}" id="loginForm">
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
              <input id="password" type="password" class="form-control" />
              <label for="password"> Password</label>
            </div>
            <div class="input-group-text">
              <span class="bi bi-lock-fill"></span>
            </div>
          </div>
          <!--begin::Row-->
          <div class="row">
            <div class="col-8 d-inline-flex align-items-center">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Sign In</button>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
        </x-base-form>

        <div class="social-auth-links text-center mb-3 d-grid gap-2">
          <p>- OR -</p>

          <a href="#" class="btn btn-danger">
            <i class="bi bi-google me-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('auth.register') }}" class="text-center"> Register a new membership </a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

@endsection
@push('script')
  <script>
    $(document).ready(function () {
      // Set CSRF token for all AJAX requests
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        let email = $('#email').val();
        let password = $('#password').val();
        let action = $(this).attr('action');

        $.ajax({
          url: action,
          type: 'POST',
          dataType: 'json',
          data: {
            email: email,
            password: password
          },
          success: function (res) {
            toastr.success(res.message);
            setTimeout(() => {
              window.location.href = "{{ route('admin.dashboard') }}";
            }, 1000);
          },
          error: function (xhr) {
            if (xhr.status === 422) {
              let errors = xhr.responseJSON.errors;
              if (errors.email) {
                toastr.error(errors.email[0]);
              }
              if (errors.password) {
                toastr.error(errors.password[0]);
              }
            }
            else if (xhr.status === 401) {
              toastr.error(xhr.responseJSON.message);
            }
            else {
              toastr.error('Something went wrong. Please try again.');
              console.error('❌ Error:', xhr);
            }
          }
        });
      });
    });
  </script>

@endpush
