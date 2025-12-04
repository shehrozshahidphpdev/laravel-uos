@props(['settings'])

<x-user.layouts.master :settings="$settings" title="home oric team">
  <main class="main">

    <x-user.hero-banner :banner="$banner" navigation="Directorate" />

    <section class="intro">
      <div class="container">

        <!-- MAIN CONTENT -->
        <div class="hero-content">
          <section class="oric-partner">

            <h1 class="primary-title jost title">Our Partner Institutes</h1>

            <p class="description">
              The Office of Research, Innovation & Commercialization (ORIC) has been established under the directives of
              the Higher Education Commission (HEC). On the direction of the worthy Vice Chancellor, University of
              Sahiwal
              has signed MoUs with both national and international institutes for academic and research enhancement.
            </p>
            <h2 class="tertiary-title title">International Partners</h2>

            <div class="course-list">
              <div class="course-item">
                <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                <p class="course-item__name">INTI International University, Malaysia</p>
              </div>
            </div>


            <h2 class="tertiary-title title">National Partners</h2>
            <div class="course-list">
              <div class="course-item">
                <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                <p class="course-item__name">BS Computer Science</p>
              </div>
              <div class="course-item">
                <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                <p class="course-item__name">IBA Sukkur University, Sukkur</p>
              </div>
              <div class="course-item">
                <div class="course-item__icon"><i class="fa-solid fa-check"></i></div>
                <p class="course-item__name">IBA Sukkur University, Sukkur</p>
              </div>
            </div>

          </section>
        </div>

        <!-- RIGHT SIDEBAR -->
        <aside class="navigation">
          <ul class="navigation__list">
            <li class="navigation__item"><a href="{{ route('user.oric') }}" class="navigation__link">ORIC</a></li>
            <li class="navigation__item"><a href="{{ route('user.oric-team') }}" class="navigation__link">Oric Team</a>
            </li>
            <li class="navigation__item"><a href="{{ route('user.oric-partner') }}" class="navigation__link">Partner
                Institutes</a></li>
            <li class="navigation__item"><a href="{{route('user.oric-publications')}}"
                class="navigation__link">Publications</a></li>
            <li class="navigation__item"><a href="#" class="navigation__link">Publication Summary</a></li>
          </ul>
        </aside>

      </div>
    </section>

  </main>
</x-user.layouts.master>