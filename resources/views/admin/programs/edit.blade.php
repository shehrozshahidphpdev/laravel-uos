<x-admin.layouts.master title=" Admin Oric Team Create">
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
      <div class="row justify-content-center">
        <div class="row col-md-12">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Programs</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.programs.update', $program->id) }}" method="PUT" :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="program_name" class="form-label">Program Name</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" name="program_name" id="program_name"
                      placeholder="Enter Program Name" value="{{ old('program_name', $program->program_name) }}" />
                  </div>
                  <div class="mb-3 col">
                    <label for="members" class="form-label">Status</label>
                    <select name="is_active" id="is_active" class="form-select">
                      <option value="" selected disabled>Please Select Sataus</option>
                      <option {{ $program->is_active == 1 ? 'selected' : ''  }} value="1">Active</option>
                      <option {{ $program->is_active == 0 ? 'selected' : ''  }} value="0">Non Active</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.oric-team') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </x-base-form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin.layouts.master>
