<x-admin.layouts.master>
  <x-slot:title>
    Admin | Departments
  </x-slot:title>
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">News</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">News</li>
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
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center" style="padding: 0.75rem 1.25rem;">
          <h3 class="card-title mb-0">News</h3>
          <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-success ms-auto">
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
                <th>Title</th>
                <th>Description</th>
                <th>slug</th>
                <th>Image</th>
                <th>Additional</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($allNews as $news)
                <tr class="align-middle">
                  <td>{{ $news->id }}</td>
                  <td>{{ $news->title }}</td>
                  <td>{{ $news->description }}</td>
                  <td>{{ $news->slug }}</td>
                  <td>
                    @if($news->image !== null)
                      <img src="{{ asset('storage/admin/uploads/' . $news->image) }}" class="rounded img-thumbnail"
                        width="100" alt="Department Image">
                    @else
                      <span class="text-danger">
                        {{ "No Image" }}
                      </span>
                    @endif
                  </td>
                  <td>
                    @foreach ($news->additional_info as $info)
                      {{ substr($info['key'] . " - " . $info['val'], 0, length: 20) . '...'   }}
                      <br>
                    @endforeach

                  </td>
                  <td><span
                      class="badge rounded-pill {{ $news->is_active == 1 ? 'text-bg-success' : 'text-bg-danger' }}">{{ $news->is_active == 1 ? 'Active' : 'InActive' }}</span>
                  </td>
                  <td>{{ $news->created_at->format('Y-m-d') }}</td>
                  {{-- <td>
                    <a href="{{ route('admin.department.edit', $news->id) }}" class="btn btn-sm btn-primary">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                  </td> --}}
                  <td> <x-base-form action="{{ route('admin.news.delete', $news->id) }}" class="delete-record"
                      data-id="{{ $news->id }}">
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

      <!--end::Row-->
    </div> <!--end::Container-->
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

        $('.delete-record').on('submit', function (e) {
          e.preventDefault();
          let form = $(this);
          let id = form.data('id');
          let action = form.attr('action');
          console.log(action);
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
