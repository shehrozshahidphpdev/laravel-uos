@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home | Depart | CS">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Hostel" />
    <section class="intro">
      <div class="container">
        <div class="hero-content">
          <article class="introduction">
            <h2 class="introduction__title">Introduction</h2>
            <p class="introduction__content">Keeping in view the importance of computer science for the country,
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

            <span class="additional__title">Vision and Mission</span>
            <p class="additional__content">
              In general, the aim of the Department of Economics is to provide insights for public policy, day-today
              businesses and reshaping human behavior, which could not only help running and to implement more
              successful business practices but to formulate effective government policy. While economists specifically
              study how markets work to determine what, how and for whom to produce questions, the department primarily
              focuses on the macroeconomic challenges of national and global impact and importance. As the strong
              commitment of the Department of Economics, University of Sahiwal is to nurture and enable a conducive
              environment for state-of-the-art focused research and policy analysis culture, it gives us an immense
              pleasure to announce that recently the department has become a leading institute of the region by
              launching its ‘M.Phil. Economics’ program to provide the researchers of economic science and equivalent
              subject areas a platform for learning more specialized subjects of economics and conducting research under
              the supervision of national- and foreign-qualified PhD faculty members. The mission of M.Phil. Economics
              program is to provide learning to the candidates so that they are capable to lead the community. They will
              be expected to develop and apply strategies for the integrated development of all sections of society.
              Since the program has been designed by keeping into consideration the HEC requirements, ‘M.Phil.
              Economics’ is a 2- year degree program of 30 credit hours distributed in four semesters.
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
            <li class="navigation__item"><a href="#" class="navigation__link">Department</a></li>
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