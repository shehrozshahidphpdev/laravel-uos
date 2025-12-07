@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home | Sports">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Sports" />
    <section class="sports">
      <div class="container">
        <aside class="navigation">
          <div class="navigation-container">
            <ul class="navigation__list">
              <li class="navigation__item"><a href="" class="go">Sports <span class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
        <section class="main-content">
          <h1 class="main-content__title">Directorate of Sports</h1>
          <p class="main-content__description text"> The directorate of sports aims at promotion of sports at grass root
            level, enhancing student affiliation with the games, ensuring all tournaments originate from
            inter-department level and culminate at the University level.
          </p>
          <h1 class="main-content__subtitle">SPORTS FACILITIES
          </h1>

          <ul class="main-content__points">
            <li class="main-content__point">
              <span class="text">To organize, promote and develop sports in the University of Sahiwal.

              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">To arrange training and coaching programs.

              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">To ensure mass participation in sports and games by organizing sports
                competitions/tournaments/Gala in the University of Sahiwal.

              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">To maintain liaison and coordinate with the HEC & HED for inter University Leagues.

              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">To ensure adequate provision of funds of sports and games in the budget of University
                of Sahiwal and their utilization to the fullest advantage for promotion and development of sports.
              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">To exercise overall administrative/functional control over all the grounds and play
                fields in the University of Sahiwal and ensure their proper maintenance and utilization.
              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>

          </ul>

        </section>
      </div>
    </section>
  </main>
</x-user.layouts.master>
