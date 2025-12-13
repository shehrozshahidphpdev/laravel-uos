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
              The Department of Law, University of Sahiwal is the first public sector institution in the division of
              Sahiwal to cater the needs of the people to get legal education. The objective of establishment of the
              department was to fill the gap created due to non-availability of public sector institution that could
              provide legal education to the people of Sahiwal Division and its suburb areas. The students of Sahiwal
              have to travel to Lahore and Multan to get legal education. Therefore, in order to cater the needs of the
              students of the locality, the Department of Law was established in the erstwhile Sub-campus of Bahauddin
              Zakariya University at Sahiwal in the year 2014. After the established of the University of Sahiwal in
              2015, the Department becomes constituent part of the University. The Department aims at steering the
              University to be a leading public sector University in providing affordable quality legal education for
              the students of the locality. The focus of the Department is to enable the students to conduct an
              independent research and to learn different aspects of resolving practical problems in legal field and
              legal aspects of different other fields. This will develop the culture of learning thinking, research and
              advocacy. The main objectives of the establishment of the Department included but not limited to: i) To
              educate and train the future lawyers, legal consultants and jurists ii) To enhance the quality and
              standard of legal education iii) To develop the culture of research in legal fields Iv) To train the
              students to possess the capacity of legal reasoning.
            </p>
            <div class="courses">
              <div class="course-list">
                <div class="course-item">
                  <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                  <p class="course-item__name">LLB</p>
                </div>
                <div class="course-item">
                  <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                  <p class="course-item__name">BS criminology</p>
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
