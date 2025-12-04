<x-admin.layouts.master>
  <x-slot:title>
    Admin | Tables
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
      <div class="card mb-4">
        <div class=" border-bottom  d-flex justify-content-between  align-items-center"
          style="padding: 0.75rem 1.25rem;">
          <h3 class="card-title mb-0">Tables Data</h3>
          <div class="btns-group">

            <a href="{{ route('admin.tables-columns.index') }}" class="btn btn-sm btn-secondary ms-auto">
              Back
            </a>
            <a href="{{ route('admin.tables-rows.create', $tableColumns->id) }}" class="btn btn-sm btn-success ms-auto">
              Create
            </a>
          </div>

        </div>
        <x-admin.show-errors />
        <x-admin.session-message />
        <div class="card-body p-0">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Table Name</th>
                @foreach ($tableColumns->columns as $colName)
                  <th>{{ $colName }}</th>
                @endforeach
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($tableData as $data)
                <tr class="align-middle">
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->table->title }}</td>
                  @foreach ($data->rows as $row)
                    <td>{{ $row }}</td>
                  @endforeach
                  <td>
                    <a href="{{ route('admin.tables-rows.edit', $data->id) }}" class="btn btn-sm btn-primary">
                      <i class="bi bi-pencil-fill"></i> </a>
                  </td>
                  <td> <x-base-form action="{{ route('admin.tables-rows.delete', $data->id) }}" class="delete-record"
                      data-id="{{ $data->id }}"> <button class="btn btn-sm btn-danger"><i
                          class="bi bi-trash"></i></button>
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

        // Setup CSRF Token
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        // Ajax Delete Record
        $('.delete-record').on('submit', function (e) {
          e.preventDefault();

          let form = $(this);
          let id = form.data('id');
          let action = form.attr('action');

          $.ajax({
            url: action,
            type: 'DELETE',
            dataType: 'json',
            data: { id: id },

            success: function (res) {
              toastr.success(res.message);
              form.closest('tr').fadeOut('slow', function () {
                $(this).remove();
              });
            },
            error: function (xhr) {
              console.log(xhr);
              toastr.error("Something went wrong!");
            },
          });
        });

      });
    </script>
  @endpush
</x-admin.layouts.master>