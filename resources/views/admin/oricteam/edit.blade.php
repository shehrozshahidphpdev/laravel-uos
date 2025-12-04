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
              <div class="card-title">News</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.oric-team.update', $oricTeam->id) }}" method="PUT" :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="dept_name" class="form-label">Department</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" name="dept_name" id="dept_name"
                      placeholder="Enter Department Name" value="{{ old('dept_name', $oricTeam->dept_name) }}" />
                  </div>
                  <div class="mb-3 col">
                    <label for="members" class="form-label">Member</label>
                    <input type="text" class="form-control" id="memberss" name="members"
                      value="{{ old('members', $oricTeam->members) }}" placeholder="Enter Member Name" />
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
