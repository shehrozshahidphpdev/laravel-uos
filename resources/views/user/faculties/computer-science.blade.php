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
              Keeping in view the importance of computer science for the country,
              Department of Computer Science was established at BZU Sub-Campus Sahiwal in 2014. Currently,
              Department of Computer Science is offering BS Computer Science (BS CS) (4 Years) degree programs in
              morning and evening sessions. In addition to these degree programs many short courses and workshops are
              arranged by the department time to time. The students in Department of Computer Science have unlimited
              access to the computers & the professional software tools. The Department has modern computer lab
              equipped with latest computing technology. The department of Computer Science has two computer labs
              equipped with state-of-the-art technology. All the computers are equipped with latest technology & the
              professional software tools and provide services such as HEC digital Library,
              video conference etc. The students and staff have access to Internet facilitates during working hours.
            </p>
            <div class="courses">
              <div class="course-list">
                <div class="course-item">
                  <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                  <p class="course-item__name">BS Computer Science</p>
                </div>
                <div class="course-item">
                  <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                  <p class="course-item__name">BS Information Technology</p>
                </div>
                <div class="course-item">
                  <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                  <p class="course-item__name">BS Software Engineering</p>
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
            <li class="navigation__item"><a href="#" class="navigation__link">Chairman</a></li>
            <li class="navigation__item"><a href="#" class="navigation__link">Faculty</a></li>
            <li class="navigation__item"><a href="#" class="navigation__link">Research Group</a></li>
            <li class="navigation__item"><a href="#" class="navigation__link">Fee Structure</a></li>
          </ul>
        </aside>
      </div>
    </section>
  </main>
</x-user.layouts.master>
