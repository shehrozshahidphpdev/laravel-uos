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
      {{-- main body cntent goes here --}}
      <div class="row justify-content-center">
        <div class="row col-md-12">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Table Columns</div>
            </div>

            <x-admin.session-message />

            <x-admin.show-errors />

            <x-base-form action="{{ route('admin.tables-columns.update', $tableColumn->id) }}" method="PUT"
              :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="table" class="form-label">Table</label> <span class="text-danger">*</span>
                    <select name="table_id" class="form-select">
                      @foreach($tables as $table)
                        <option value="{{ $table->id }}" {{ old('table_id', $tableColumn->table_id) == $table->id ? 'selected' : '' }}>
                          {{ $table->title }}
                        </option>
                      @endforeach
                    </select>

                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col">
                    <label for="table" class="form-label">Table columns</label> <span class="text-danger">*</span>
                    <div class="cols-group">
                      @foreach ($tableColumns as $key => $column)
                        @if ($key == 0)
                          <div class="input-group mb-2">
                            <input type="text" class="form-control" name="columns[]" value="{{ $column }}"
                              placeholder="Enter column Name Here..." />
                            <button class="btn btn-sm btn-primary add-field">
                              <i class="bi bi-plus"></i>
                            </button>
                          </div>
                        @else
                          <div class="input-group mt-2">
                            <input type="text" class="form-control" name="columns[]" value="{{ $column }}"
                              placeholder="Enter column name..." />
                            <button class="btn btn-sm btn-danger remove-field">
                              <i class="bi bi-trash"></i>
                            </button>
                          </div>
                        @endif
                      @endforeach
                    </div>

                  </div>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('admin.tables-columns.index') }}" class="btn btn-secondary">Back</a>
              </div>
            </x-base-form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    <script>
      $(document).ready(function () {

        // ADD FIELD
        $('.add-field').on('click', function (e) {
          e.preventDefault();
          $('.cols-group').append(`
                                                                                        <div class="input-group mt-2">
                                                                                            <input type="text" class="form-control" name="columns[]" placeholder="Enter column name..." />
                                                                                            <button class="btn btn-sm btn-danger remove-field">
                                                                                                <i class="bi bi-trash"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    `);
        });

        // REMOVE FIELD (delegated event)
        $(document).on('click', '.remove-field', function (e) {
          e.preventDefault();
          $(this).closest('.input-group').remove();
        });

      });

      logo.onchange = e => preview.src = URL.createObjectURL(e.target.files[0]);
    </script>

  @endpush
</x-admin.layouts.master>