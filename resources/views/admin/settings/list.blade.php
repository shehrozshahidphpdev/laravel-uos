<x-admin.layouts.master>
  <x-slot:title>
    Admin | Departments
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
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center" style="padding: 0.75rem 1.25rem;">
          <h3 class="card-title mb-0">Settings</h3>
          <a href="{{ route('admin.settings.create') }}" class="btn btn-sm btn-success ms-auto">
            <i class="bi bi-plus-circle me-1"></i> Create
          </a>
        </div>

        @if(session()->has('message'))
          <script>
            document.addEventListener("DOMContentLoaded", function () {
              toastr.success("{{ session('message') }}")
            })
          </script>
        @endif
        @if(session()->has('error'))
          <script>
            document.addEventListener("DOMContentLoaded", function () {
              toastr.error("{{ session('error') }}")
            })
          </script>
        @endif
        <div class="card-body p-0">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Phone No</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Copy Rights</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($settings as $setting)
                <tr class="align-middle">
                  <td>{{ $setting->id }}</td>
                  <td>{{ $setting->phone_no }}</td>
                  <td>{{ $setting->email }}</td>
                  <td>
                    <img src="{{ asset('storage/admin/uploads/' . $setting->logo) }}" class="rounded img-thumbnail"
                      width="100" alt="Setting logo">
                  </td>
                  <td>{{ Str::limit($setting->copyrights, 20)   }}</td>
                  <td>{{ $setting->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-sm btn-primary">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                  </td>
                  <td> <x-base-form action="{{ route('admin.setting.delete', $setting->id) }}" class="delete-record"
                      data-id="{{ $setting->id }}">
                      <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </x-base-form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center text-muted py-3">
                    Sorry! No Data Found
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

    </div> <!--end::Container-->
  </div>
  @push('scripts')
    <script>
      $(document).ready(function () {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('.delete-record').on('submit', function (e) {
          e.preventDefault();
          let form = $(this);
          let id = form.data('id');
          let action = form.attr('action');
          $.ajax({
            url: action,
            type: 'delete',
            dataType: 'json',
            success: function (res) {
              console.log(res);
              toastr.success(res.message);
              form.closest('tr').fadeOut('slow').remove();
            },
            error: function (xhr) {
              console.log(xhr);

            },
          })
        })
      })
    </script>
  @endpush


</x-admin.layouts.master>
