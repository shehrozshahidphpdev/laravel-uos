@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home | Depart | CS">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Hostel" />
    <section class="intro">
      <div class="container">
        <div class="hero-content">
          <article class="introduction">
            <h2 class="introduction__title">Introduction</h2>
            <p class="introduction__content">
              The Department of Physics at University of Sahiwal was established in 2015. The main purpose is to provide
              quality education and basic understanding of Physics to the students. The Department of Physics is
              equipped with two modern Physics Labs for the skill development in many areas. The course study at BS/MSc
              levels, educates the participants with various aspects of matter, motion, energy, time, and so on. There
              exist ample master level courses for candidates who are interested in higher education. Apart from this,
              the candidates can seek career opportunities in research and development, science, education and other
              related areas. Higher education after BS/MSc degree increases the proximity to get in to a high
              designation job with rewarding compensation packages. The tools of the physicist- observation,
              imagination, model building, prediction, and deduction will enable physics to continue this influence into
              the new century. The Master of Science in Physics degree program is designed to provide the skills,
              understanding, and outlook required for participation in the discovery of new knowledge about nature.
            </p>
            <div class="courses">
              <div class="course-list">
                <div class="course-item">
                  <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                  <p class="course-item__name">BS Physics</p>
                </div>
                <div class="course-item">
                  <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                  <p class="course-item__name">Mphill Physics</p>
                </div>
              </div>
          </article>

          <section class="sos">
            {{-- Loop through all Program Schemes dynamically --}}
            @foreach($allSchemes as $scheme)
              <h2 class="sos__title">
                Scheme of Studies BS {{ $scheme->program_title }}
              </h2>

              <div class="table-container">
                <table class="table">
                  @php
                    $semesters = $scheme->courses;
                    $pairs = [
                      ['semester_1', 'semester_2'],
                      ['semester_3', 'semester_4'],
                      ['semester_5', 'semester_6'],
                      ['semester_7', 'semester_8'],
                    ];
                  @endphp

                  @foreach($pairs as $pair)
                    <thead class="table-head">
                      <tr>
                        <th><b>{{ ucfirst(str_replace('_', ' ', $pair[0])) }}</b></th>
                        <th><b>{{ ucfirst(str_replace('_', ' ', $pair[1])) }}</b></th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr class="odd">
                        <td>
                          <ol>
                            @if(isset($semesters[$pair[0]]))
                              @foreach($semesters[$pair[0]] as $course)
                                <li>{{ $course }}</li>
                              @endforeach
                            @endif
                          </ol>
                        </td>
                        <td>
                          <ol>
                            @if(isset($semesters[$pair[1]]))
                              @foreach($semesters[$pair[1]] as $course)
                                <li>{{ $course }}</li>
                              @endforeach
                            @endif
                          </ol>
                        </td>
                      </tr>
                    </tbody>
                  @endforeach
                </table>
              </div>
            @endforeach
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
