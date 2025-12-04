<x-admin.layouts.master title="Admin - oric-team">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row justify-content-end">
        <div class="col-sm-6">
          <x-admin.bread-crumbs :items="$breadcrumbs" />
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center" style="padding: 0.75rem 1.25rem;">
          <h3 class="card-title mb-0">Oric Teams</h3>
          <a href="{{ route('admin.oric-team.create') }}" class="btn btn-sm btn-success ms-auto">
            <i class="bi bi-plus-circle me-1"></i> Create
          </a>
        </div>
        <x-admin.session-message />
        <div class="card-body p-0">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Department Name</th>
                <th>Members</th>
                <th>Created_at</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($oricTeams as $oricTeam)
                <tr class="align-middle">
                  <td>{{ $oricTeam->id }}</td>
                  <td>{{ $oricTeam->dept_name }}</td>
                  <td>{{ $oricTeam->members }}</td>

                  <td>{{ $oricTeam->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.oric-team.edit', $oricTeam->id) }}" class="btn btn-sm btn-primary">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                  </td>
                  <td> <x-base-form action="{{ route('admin.oric-team.delete', $oricTeam->id) }}" class="delete-record"
                      data-id="{{ $oricTeam->id }}">
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
      })
    </script>
  @endpush
</x-admin.layouts.master>
