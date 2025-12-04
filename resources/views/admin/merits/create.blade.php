<x-admin.layouts.master>
  <x-slot:title>
    Admin | Administration
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
      <div class="row justify-content-center">
        <div class="row col-md-12">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Merit</div>
            </div>

            <x-admin.show-errors />

            <x-base-form action="{{ route('admin.merit.store') }}" :media="true">
              <div class="card-body">

                <div class="row">
                  <div class="mb-3 col">
                    <label for="program_name" class="form-label">Program Name</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="program_name" name="program_name"
                      value="{{ old('program_name') }}" placeholder="Enter Program Name Here..." />
                  </div>
                  <div class="mb-3 col">
                    <label class="form-label">Shift</label> <span class="text-danger">*</span><br>
                    <input class="form-check-input" type="radio" name="shift" id="Morning" value="Morning">
                    <label class="form-check-label" for="Morning">Morning</label>
                    <input class="form-check-input" type="radio" name="shift" id="Evening" value="Evening">
                    <label class="form-check-label" for="Evening">Evening</label>
                  </div>
                </div>

                <!-- 1st & 2nd -->
                <div class="row">
                  <div class="mb-3 col">
                    <label for="first_merit_list" class="form-label">1 Merit List</label>
                    <input type="file" class="form-control" id="first_merit_list" name="first_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="first_preview_container">
                      <iframe id="first_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                  <div class="mb-3 col">
                    <label for="second_merit_list" class="form-label">2 Merit List</label>
                    <input type="file" class="form-control" id="second_merit_list" name="second_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="second_preview_container">
                      <iframe id="second_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                </div>

                <!-- 3rd & 4th -->
                <div class="row">
                  <div class="mb-3 col">
                    <label for="third_merit_list" class="form-label">3 Merit List</label>
                    <input type="file" class="form-control" id="third_merit_list" name="third_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="third_preview_container">
                      <iframe id="third_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                  <div class="mb-3 col">
                    <label for="fourth_merit_list" class="form-label">4 Merit List</label>
                    <input type="file" class="form-control" id="fourth_merit_list" name="fourth_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="fourth_preview_container">
                      <iframe id="fourth_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                </div>

                <!-- 5th & 6th -->
                <div class="row">
                  <div class="mb-3 col">
                    <label for="fifth_merit_list" class="form-label">5 Merit List</label>
                    <input type="file" class="form-control" id="fifth_merit_list" name="fifth_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="fifth_preview_container">
                      <iframe id="fifth_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                  <div class="mb-3 col">
                    <label for="sixth_merit_list" class="form-label">6 Merit List</label>
                    <input type="file" class="form-control" id="sixth_merit_list" name="sixth_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="sixth_preview_container">
                      <iframe id="sixth_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                </div>

                <!-- 7th & 8th -->
                <div class="row">
                  <div class="mb-3 col">
                    <label for="seventh_merit_list" class="form-label">7 Merit List</label>
                    <input type="file" class="form-control" id="seventh_merit_list" name="seventh_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="seventh_preview_container">
                      <iframe id="seventh_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                  <div class="mb-3 col">
                    <label for="eighth_merit_list" class="form-label">8 Merit List</label>
                    <input type="file" class="form-control" id="eighth_merit_list" name="eighth_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="eighth_preview_container">
                      <iframe id="eighth_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                </div>

                <!-- 9th & 10th -->
                <div class="row">
                  <div class="mb-3 col">
                    <label for="nineth_merit_list" class="form-label">9 Merit List</label>
                    <input type="file" class="form-control" id="nineth_merit_list" name="nineth_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="nineth_preview_container">
                      <iframe id="nineth_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                  <div class="mb-3 col">
                    <label for="tenth_merit_list" class="form-label">10 Merit List</label>
                    <input type="file" class="form-control" id="tenth_merit_list" name="tenth_merit_list"
                      accept=".pdf,image/*" />
                    <div class="mt-2 border rounded" style="height:380px;display:none;" id="tenth_preview_container">
                      <iframe id="tenth_preview" style="width:100%;height:100%;border:none;"></iframe>
                    </div>
                  </div>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.merits') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </x-base-form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      // Super simple & working 100%
      const previews = [
        'first', 'second', 'third', 'fourth', 'fifth',
        'sixth', 'seventh', 'eighth', 'nineth', 'tenth'
      ];

      previews.forEach(name => {
        const input = document.getElementById(name + '_merit_list');
        const container = document.getElementById(name + '_preview_container');
        const iframe = document.getElementById(name + '_preview');

        input.addEventListener('change', function (e) {
          if (this.files && this.files[0]) {
            const url = URL.createObjectURL(this.files[0]);
            iframe.src = url;
            container.style.display = 'block';
          } else {
            container.style.display = 'none';
            iframe.src = '';
          }
        });
      });
    </script>
  @endpush
</x-admin.layouts.master>
