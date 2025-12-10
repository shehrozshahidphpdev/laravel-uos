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
              <div class="card-title">Scheme Of studies</div>
            </div>
            <x-admin.session-message />
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.sos.update', $scheme->id) }}" method="PUT">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="table" class="form-label"> subject</label> <span class="text-danger">*</span>
                    <select name="subject_id" class="form-select">
                      <option value="" selected disabled>Select a Subject</option>
                      @foreach ($programs as $program)
                        <option value="{{ $program->id }}" {{ $scheme->subject_id == $program->id ? 'selected' : '' }}>
                          {{ $program->subject }}
                        </option>
                      @endforeach
                    </select>

                  </div>

                  <div class="mb-3 col">
                    <label for="program_title" class="form-label"> Program Title</label> <span
                      class="text-danger">*</span>
                    <input type="text" name="program_title" class="form-control" placeholder="Enter Program Title"
                      value="{{ old('program_title', $scheme->program_title) }}" />

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    @for ($i = 1; $i <= 8; $i++)
                      <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                          Semester {{ $i }}
                        </div>
                        <div class="card-body">
                          <div id="semester-{{ $i }}-group">
                            @php
                              $semesterCourses = $scheme->courses['semester_' . $i] ?? [];
                            @endphp

                            @forelse($semesterCourses as $index => $course)
                              <div class="input-group mb-2">
                                <input type="text" name="courses[semester_{{ $i }}][]" class="form-control"
                                  placeholder="Enter course name..." value="{{ $course }}" />
                                @if($index == 0)
                                  <button class="btn btn-sm btn-primary add-course" data-semester="{{ $i }}">
                                    <i class="bi bi-plus"></i>
                                  </button>
                                @else
                                  <button class="btn btn-sm btn-danger remove-course">
                                    <i class="bi bi-trash"></i>
                                  </button>
                                @endif
                              </div>
                            @empty
                              <div class="input-group mb-2">
                                <input type="text" name="courses[semester_{{ $i }}][]" class="form-control"
                                  placeholder="Enter course name..." />
                                <button class="btn btn-sm btn-primary add-course" data-semester="{{ $i }}">
                                  <i class="bi bi-plus"></i>
                                </button>
                              </div>
                            @endforelse
                          </div>
                        </div>
                      </div>
                    @endfor
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('admin.sos.index') }}" class="btn btn-secondary">Back</a>
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

        // ADD COURSE FIELD
        $(document).on('click', '.add-course', function (e) {
          e.preventDefault();

          let semester = $(this).data('semester');
          let container = $("#semester-" + semester + "-group");

          container.append(`
                                                                                        <div class="input-group mb-2">
                                                                                            <input type="text" name="courses[semester_${semester}][]" class="form-control"
                                                                                                placeholder="Enter course name..." />
                                                                                            <button class="btn btn-sm btn-danger remove-course">
                                                                                                <i class="bi bi-trash"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    `);
        });

        // REMOVE COURSE FIELD
        $(document).on('click', '.remove-course', function (e) {
          e.preventDefault();
          $(this).closest('.input-group').remove();
        });

      });
    </script>
  @endpush

</x-admin.layouts.master>