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
              Study of the world of atoms, molecules, liquids, solids and gases is concerned with the knowledge of
              Chemistry. Chemists are both architects and students of miniature universe, involved in discovering the
              changes that occurs, exploring the principles that govern on these changes. History told us about the
              triumphs of chemistry in the fields of agricultural and medicinal products. Currently chemistry has
              revealed the modem ways of achieving aims and objectives in the fields of solar cells, semiconductor,
              superconductor, optical fiber, clean fuels, chemical memory, batteries and solution to various
              environmental issues. Chemistry department University of Sahiwal was established in 2014, department is
              offering program according to HEC course outline and has highly qualified, committed and excellent
              faculty. The future of the chemistry graduates is bright in different fields, e.g. Medical, Fertilizers,
              Cosmetics, Textiles, Food, New materials, Petrochemicals, Plastics, Alternative energy sources, Nano
              technology and Space Technology etc.
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
