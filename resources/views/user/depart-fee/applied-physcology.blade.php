@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Admin - HOD - Computer Science">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Downloads" />
    <section class="intro">
      <div class="container">
        <div class="hero-content">
          <section class="sos">
            @forelse($feeStructures as $feeStructure)

              <h2 class="sos__title">{{ $feeStructure->program_title }}</h2>

              <div class="table-container">
                <table class="table">

                  {{-- Semester 1–4 --}}
                  <thead class="table-head">
                    <tr>
                      <th><b>Semester I</b></th>
                      <th><b>Semester II</b></th>
                      <th><b>Semester III</b></th>
                      <th><b>Semester IV</b></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="odd">
                      <td>{{ $feeStructure->courses['semester_1'][0] ?? '-' }}</td>
                      <td>{{ $feeStructure->courses['semester_2'][0] ?? '-' }}</td>
                      <td>{{ $feeStructure->courses['semester_3'][0] ?? '-' }}</td>
                      <td>{{ $feeStructure->courses['semester_4'][0] ?? '-' }}</td>
                    </tr>
                  </tbody>

                  {{-- Semester 5–8 --}}
                  <thead class="table-head">
                    <tr>
                      <th><b>Semester V</b></th>
                      <th><b>Semester VI</b></th>
                      <th><b>Semester VII</b></th>
                      <th><b>Semester VIII</b></th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr class="odd">
                      <td>{{ $feeStructure->courses['semester_5'][0] ?? '-' }}</td>
                      <td>{{ $feeStructure->courses['semester_6'][0] ?? '-' }}</td>
                      <td>{{ $feeStructure->courses['semester_7'][0] ?? '-' }}</td>
                      <td>{{ $feeStructure->courses['semester_8'][0] ?? '-' }}</td>
                    </tr>
                  </tbody>

                </table>
              </div>

            @empty
              <h2>No Fee Structure Found!</h2>
            @endforelse

          </section>
        </div>
        <aside class="navigation">
          <ul class="navigation__list">
            <li class="navigation__item"><a href="{{ route('user.department.departmentPage', 'computer-science') }}"
                class="navigation__link">Department</a></li>
            <li class="navigation__item"><a href="{{ route('user.department.chairmanPage', $slug) }}"
                class="navigation__link">Chairman</a></li>
            <li class="navigation__item"><a href="{{ route('user.department.departmentFaculty', $slug) }}"
                class="navigation__link">Faculty</a></li>
            <li class="navigation__item"><a href="{{ route('user.department.fee-structure', $slug) }}"
                class="navigation__link">Fee Structure</a></li>
          </ul>
        </aside>
      </div>
    </section>
  </main>

</x-user.layouts.master>