<x-admin.layouts.master>
  <x-slot:title>
    Admin | Events
  </x-slot:title>
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
          <h3 class="card-title mb-0">Events</h3>
          <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-success ms-auto">
            <i class="bi bi-plus-circle me-1"></i> Create
          </a>
        </div>
        <x-admin.session-message />
        <div class="card-body p-0">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Title</th>
                <th>slug</th>
                <th>Poster</th>
                <th>Additional</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($events as $event)
                <tr class="align-middle">
                  <td>{{ $event->id }}</td>
                  <td>{{ Str::limit($event->title, 20) }}</td>
                  <td>{{ Str::limit($event->slug, 20) }}</td>
                  <td>
                    @if($event->poster !== null)
                      <img src="{{ asset('storage/admin/uploads/' . $event->poster) }}" class="rounded img-thumbnail"
                        width="100" alt="Department Image" style="height: 60px">
                    @else
                      <span class="text-danger">
                        {{ "No Image" }}
                      </span>
                    @endif
                  </td>
                  <td>
                    {{ Str::limit(strip_tags($event->description), 20) }}
                  </td>
                  <td><span
                      class="badge rounded-pill {{ $event->is_active == 1 ? 'text-bg-success' : 'text-bg-danger' }}">{{ $event->is_active == 1 ? 'Active' : 'InActive' }}</span>
                  </td>
                  <td>{{ $event->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-sm btn-primary">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                  </td>
                  <td> <x-base-form action="{{ route('admin.event.delete', $event->id) }}" class="delete-record"
                      data-id="{{ $event->id }}">
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
              id: id,
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