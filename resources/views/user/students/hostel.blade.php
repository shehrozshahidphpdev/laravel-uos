@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home | Hostel">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Hostel" />
    <section class="hostel">
      <div class="container">
        <aside class="navigation">
          <div class="navigation-container">
            <ul class="navigation__list">

              <li class="navigation__item"><a href="" class="go">Hostel <span class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
        <section class="main-content">
          <h1 class="main-content__title">University Girl’s Hostel</h1>
          <p class="main-content__description text"> Fatima Jinnah Hall (University Girls Hostel) is a well renowned
            Hostel located within the University. We provide all services under one roof in a safe and secure
            environment. Best suited for those students who are looking for a peaceful, not noisy and comfort living
            near university.
          </p>
          <ul class="main-content__points">
            <li class="main-content__point">
              <span class="text">University of Sahiwal has a big hostel with capacious building.
              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">The facility of visiting room is also available.
              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">There are 55 capacious rooms with 4 big halls and a dining room and a Kitchen.
              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">The facility of internet is also available.
              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">A water filtration plant is also installed for students.
              </span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>

          </ul>

        </section>
      </div>
    </section>
  </main>
</x-user.layouts.master>
