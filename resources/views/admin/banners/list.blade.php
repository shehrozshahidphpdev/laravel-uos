<x-admin.layouts.master>
  <x-slot:title>
    Admin | Directorates
  </x-slot:title>
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row justify-content-end">
        <div class="col-sm-6">
          <x-admin.bread-crumbs :items="$breadCrumbs" />
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      <div class="card mb-4">
        <div class="d-flex justify-content-between align-items-center" style="padding: 0.75rem 1.25rem;">
          <h3 class="card-title mb-0">Banners</h3>

          <div class="d-flex align-items-center gap-2">
            <form action="#" class="d-flex">
              <input type="search" name="search" class="form-control form-control-sm" placeholder="Search...">
            </form>

            <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-success">
              <i class="bi bi-plus-circle me-1"></i> Create
            </a>
          </div>
        </div>
        <x-admin.session-message />
        <div class="card-body p-0">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Slug</th>
                <th>Title</th>
                <th>Banner</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="banner-table-body">
              @forelse ($banners as $banner)
                <tr class="align-middle">
                  <td>{{ $banner->id }}</td>
                  <td>{{ Str::limit($banner->slug, 20, '...') }}</td>
                  <td>{{ Str::limit($banner->title, 20)}}</td>
                  <td>
                    <img src="{{ asset('storage/admin/uploads/' . $banner->banner) }}" class="rounded img-thumbnail"
                      width="100" alt="Department Image">
                  </td>
                  <td>
                    <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-sm btn-primary">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                  </td>

                  <td> <x-base-form action="{{ route('admin.banner.delete', $banner->id) }}" class="delete-record"
                      data-id="{{ $banner->id }}">
                      <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </x-base-form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="12" class="text-center text-muted py-3">
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
          console.log(action);
          $.ajax({
            url: action,
            type: 'delete',
            dataType: 'json',
            data: {
              id: id
            },
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
        // LIVE SEARCH
        $('input[name="search"]').on('keyup', function () {
          let value = $(this).val();

          $.ajax({
            url: "{{ route('admin.banners') }}",
            type: "GET",
            data: { search: value },
            success: function (res) {
              $("#banner-table-body").html(res.html);
            }
          });
        });

      })
    </script>
  @endpush


</x-admin.layouts.master>
