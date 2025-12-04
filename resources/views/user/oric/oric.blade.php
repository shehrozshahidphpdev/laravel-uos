@props(['settings'])
<x-user.layouts.master :settings="$settings" title="home oric team">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Directorate" />
    <section class="intro">
      <div class="container">
        <div class="hero-content">
          <section class="oric-team">
            <h1 class="primary-title jost title">Office of Research Innovation & Commercialization</h1>
            <p class="description">
              The Office of Research, Innovation & Commercialization (ORIC) has been established under the directives of
              the Higher Education Commission (HEC).
            </p>
            <h2 class="secondary-title title">VISION</h2>
            <p class="description">The Office of Research, Innovation and Commercialization (ORIC) of University of
              Sahiwal aims to be a leader in promoting excellence in research and innovation across the academic
              community; to enable the faculty and researchers of our University to become a front-runner in research,
              innovation and commercialization.</p>
            <h2 class="secondary-title title">MISSION</h2>
            <p class="description">ORIC is dedicated to cultivating an environment of intellectual growth and engagement
              by empowering faculty and researchers with resources to optimize their research potential. We are
              committed to fostering innovation through collaboration with external stakeholders, enhancing the value of
              research projects, and facilitating commercialization opportunities for ground-breaking ideas. We strive
              to promote a research environment by providing cutting-edge knowledge, creating an environment of
              collaboration, creativity, and innovation that brings together key stakeholders from both within and
              outside our University. To accomplish the vision and mission of ORIC, we are committed to:</p>
            <div class="check-points">
              <div class="check-point">
                <p>Identify research opportunities for faculty members and facilitating them to apply for research
                  grants.
                </p>
                <span class="icon">
                  <i class="fa-solid fa-check"></i>
                </span>
              </div>

              <div class="check-point">
                <p>Identify research opportunities for faculty members and facilitating them to apply for research
                  grants.
                </p>
                <span class="icon">
                  <i class="fa-solid fa-check"></i>
                </span>
              </div>

              <div class="check-point">
                <p>Identify research opportunities for faculty members and facilitating them to apply for research
                  grants.
                </p>
                <span class="icon">
                  <i class="fa-solid fa-check"></i>
                </span>
              </div>

              <div class="check-point">
                <p>Identify research opportunities for faculty members and facilitating them to apply for research
                  grants.
                </p>
                <span class="icon">
                  <i class="fa-solid fa-check"></i>
                </span>
              </div>
            </div>
          </section>
        </div>
        <aside class="navigation">
          <ul class="navigation__list">
            <li class="navigation__item"><a href="{{ route('user.oric') }}" class="navigation__link">ORIC</a></li>
            <li class="navigation__item"><a href="{{route('user.oric-team')}}" class="navigation__link">Oric Team</a>
            </li>
            <li class="navigation__item"><a href="{{ route('user.oric-partner') }}" class="navigation__link">Partner
                Institutes</a></li>
            <li class="navigation__item"><a href="{{ route('user.oric-publications') }}"
                class="navigation__link">Publications</a></li>
            <li class="navigation__item"><a href="{{ route('user./oric-publication-summary') }}"
                class="navigation__link">Publication Summary</a></li>
          </ul>
        </aside>
      </div>
    </section>
  </main>
</x-user.layouts.master>