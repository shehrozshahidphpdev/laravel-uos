<x-admin.layouts.master title="Admin | Programs">
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
          <h3 class="card-title mb-0">Programs</h3>
          <a href="{{ route('admin.programs.create') }}" class="btn btn-sm btn-success ms-auto">
            <i class="bi bi-plus-circle me-1"></i> Create
          </a>
        </div>
        <x-admin.session-message />
        <div class="card-body p-0">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Program Name</th>
                <th>status</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($programs as $program)
                <tr class="align-middle">
                  <td>{{ $program->id }}</td>
                  <td>{{ $program->program_name }}</td>
                  <td>
                    <span class="badge rounded-pill bg-{{ $program->is_active ? 'success' : 'danger' }}">
                      {{ $program->is_active ? 'Active' : 'Inactive' }}
                    </span>
                  </td>
                  <td>{{ $program->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn btn-sm btn-primary">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                  </td>
                  <td> <x-base-form action="{{ route('admin.programs.destroy', $program->id) }}" class="delete-record"
                      data-id="{{ $program->id }}">
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
      })
    </script>
  @endpush


</x-admin.layouts.master>
