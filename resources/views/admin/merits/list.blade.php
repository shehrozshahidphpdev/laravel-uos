<x-admin.layouts.master>
  <x-slot:title>
    Admin | Administration
  </x-slot:title>
  @push('styles')
    <style>
      .bi-dot {
        font-size: 2rem;
      }
    </style>
  @endpush
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
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center" style="padding: 0.75rem 1.25rem;">
          <h3 class="card-title mb-0">Merit</h3>
          <a href="{{ route('admin.merit.create') }}" class="btn btn-sm btn-success ms-auto">
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
                <th>Shift</th>
                <th>1 List</th>
                <th>2 list</th>
                <th>3 list</th>
                <th>4 list</th>
                <th>5 list</th>
                <th>6 list</th>
                <th>7 list</th>
                <th>8 list</th>
                <th>9 list</th>
                <th>10 list</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($merits as $merit)
                <tr class="align-middle">
                  <td>{{ $merit->id }}</td>
                  <td>{{ $merit->program_name }}</td>
                  <td>{{ $merit->shift }}</td>
                  <td>
                    @if(isset($merit->first_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>

                  <td>

                    @if(isset($merit->second_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>
                  <td>

                    @if(isset($merit->third_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>

                  <td>

                    @if(isset($merit->fourth_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>

                  <td>

                    @if(isset($merit->fifth_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>
                  <td>

                    @if(isset($merit->sixth_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>
                  <td>

                    @if(isset($merit->seventh_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>

                  <td>

                    @if(isset($merit->eighth_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>
                  <td>

                    @if(isset($merit->nineth_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>
                  <td>

                    @if(isset($merit->tenth_merit_list))
                      <i class="bi bi-check text-success"></i>
                    @else
                      <i class="bi bi-x text-danger"></i>
                    @endif
                  </td>

                  <td>
                    <a href="{{ route('admin.merit.edit', $merit->id) }}" class="btn btn-sm btn-primary">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                  </td>

                  <td> <x-base-form action="{{ route('admin.merit.delete', $merit->id) }}" class="delete-record"
                      data-id="{{ $merit->id }}">
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
  </div> @push('scripts')
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
