<x-admin.layouts.master title=" Admin Oric Team Create">
  @push('styles')
    <style>
      .input-group {
        margin-bottom: 2rem;
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
      <div class="row justify-content-center">
        <div class="row col-md-12">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Oric Publication</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.oric-publication.update', $oricPublication->id) }}" method="PUT">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="name" class="form-label">Name</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter  Name"
                      value="{{ old('name', $oricPublication->name) }}" />
                  </div>
                  <div class="mb-3 col">
                    <label for="rank" class="form-label">Rank</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="ranks" name="rank"
                      value="{{ old('rank', $oricPublication->rank) }}" placeholder="Enter Rank" />
                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col">
                    <label for="department" class="form-label">Department</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" name="department" id="department"
                      placeholder="Enter Department" value="{{ old('department', $oricPublication->department) }}" />
                  </div>
                  <div class="mb-3 col">
                    <label for="category" class="form-label">Category</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" name="category" id="category"
                      placeholder="Enter Category Here..." value="{{ old('category', $oricPublication->category) }}" />

                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col">
                    <label for="title" class="form-label">Title</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title"
                      value="{{ old('title', $oricPublication->title) }}" />
                  </div>
                  <div class="mb-3 col">
                    <label for="journal" class="form-label">Journal</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="a" name="journal"
                      value="{{ old('journal', $oricPublication->journal) }}" placeholder="Enter Member Name" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="name" class="form-label">Year</label> <span class="text-danger">*</span>
                    <select name="year" id="year" class="form-control">
                      <option disabled selected>***Select a Year***</option>
                      <option {{  $oricPublication->year == 2017 ? 'selected' : '' }} value="2017">2017</option>
                      <option {{  $oricPublication->year == 2018 ? 'selected' : '' }} value="2018">2018</option>
                      <option {{  $oricPublication->year == 2019 ? 'selected' : '' }} value="2019">2019</option>
                      <option {{  $oricPublication->year == 2020 ? 'selected' : '' }} value="2020">2020</option>
                      <option {{  $oricPublication->year == 2021 ? 'selected' : '' }} value="2021">2021</option>
                      <option {{  $oricPublication->year == 2022 ? 'selected' : '' }} value="2022">2022</option>
                      <option {{  $oricPublication->year == 2023 ? 'selected' : '' }} value="2023">2023</option>
                      <option {{  $oricPublication->year == 2024 ? 'selected' : '' }} value="2024">2024</option>
                      <option {{  $oricPublication->year == 2025 ? 'selected' : '' }} value="2025">2025</option>
                      <option {{  $oricPublication->year == 2026 ? 'selected' : '' }} value="2026">2026</option>
                    </select>
                  </div>
                  <div class="mb-3 col">
                    <label for="if" class="form-label">I.F</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="if" name="if"
                      value="{{ old('if', $oricPublication->if) }}" placeholder="Enter If" />
                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col">
                    <label for="rank" class="form-label">Authors</label><span class="text-danger">*</span>
                    <div class="author-group">
                      @foreach ($oricPublication->authors as $key => $value)
                      @if($key < 1)
                           <div class="input-group">
                          <input type="text" class="form-control" id="authors" name="authors[]"
                            value="{{ $value }}" placeholder="Enter Author Name..." />
                          <button type="button" class="btn btn-sm btn-primary" id="add-field" title="add field">
                            <i class="bi bi-plus"></i>
                          </button>
                        </div>
                      @else
                <div class="input-group">
                          <input type="text" class="form-control" id="authors" name="authors[]"
                            value="{{ $value }}" placeholder="Enter Author Name..." />
                          <button type="button" class="btn btn-sm btn-danger" id="remove-field" title="add field">
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
                <a href="{{ route('admin.oric-publication') }}" class="btn btn-secondary">Cancel</a>
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
        $('#add-field').on('click', function (e) {
          e.preventDefault();
          console.log('Hello');
          $('.author-group').append(`
                                  <div class="input-group">
                                  <input type="text" class="form-control" id="authors" name="authors[]"
                             placeholder="Enter Author Name..." />
                                    <button type="button" class="btn btn-sm btn-danger" id="remove-field" title="add field">
                                      <i class="bi bi-trash"></i>
                                    </button>
                                  </div>`)
        });
        $(document).on('click', '#remove-field', function (e) {
          e.preventDefault();
          $(this).closest('.input-group').remove();
        });
      });
    </script>
  @endpush
</x-admin.layouts.master>
