@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home | Depart | CS">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Hostel" />
    <section class="intro">
      <div class="container">
        <div class="hero-content">
          <article class="introduction">
            <h2 class="introduction__title">Introduction</h2>
            <p class="introduction__content">The Department of Applied Psychology is a specialized academic department
              that focuses on the practical application of psychological theories and research to real-world issues.
              Applied psychology uses psychological principles and methods to address practical problems and promote
              positive change in individuals, groups, organizations, and society. The department offer graduate program
              in the clinical psychology. The faculty in the Department of Applied Psychology are typically
              practitioners and scholars with expertise in specific areas of psychology, and they conduct research,
              offer clinical services, and provide consulting services to various organizations and communities.
              Students in the department are trained in both the theoretical foundations of psychology and the practical
              skills necessary to apply psychological principles to real-world problems.
            </p>

            <span class="additional__title">Vision</span>
            <p class="additional__content">
              The Applied Psychology Department strives to be a world-class center of excellence in psychological
              research, education, and clinical practice. Our vision is to promote the understanding of human behavior
              and mental processes through scientific inquiry, and to use this knowledge to advance individual and
              societal well-being.
            </p>


            <span class="additional__title">Mission</span>
            <p class="additional__content">
              The mission of the Applied Psychology Department is to provide high-quality education and training in
              psychology, conduct cutting-edge research, and provide evidence-based clinical services to the community.
              We are committed to fostering an environment of diversity, inclusivity, and mutual respect among faculty,
              staff, and students. We strive to produce graduates who are knowledgeable, ethical, and skilled in
              applying psychological principles to real-world issues. Through our research, we aim to advance knowledge
              in psychology and related fields, and to contribute to the development of evidence-based interventions
              that improve the lives of individuals and communities. We seek to engage with the broader community to
              promote awareness and understanding of the value of psychological research and practice.
            </p>

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
