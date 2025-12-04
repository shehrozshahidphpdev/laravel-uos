@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Introduction
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner title="Chancellor's Message" navigation="Chancellors Message" />
    <section class="downloads">
      <div class="container">
        <aside class="navigation">
          <div class="navigation-container">
            <ul class="navigation__list">
              <li class="navigation__item"><a href="" class="go">News <span class="icon"></span></a></li>
              <li class="navigation__item "><a href="" class="go">Notification <span class="icon"></span></a>
              </li>
              <li class="navigation__item"><a href="" class="go">Download Forms <span class="icon"></span></a></li>
              <li class="navigation__item"><a href="" class="go">Scholarships <span class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
        <div class="cards-container">
          <div class="download-card">
            <p class="download-card__caption">Standing Accessibility Committe</p>
            <a href="" class="download-card__link">
              Download Notification <i class="fa-solid fa-download"></i>
            </a>
          </div>
          <div class="download-card">
            <p class="download-card__caption">Inquiry Committe Against Workspace Harrasement</p>
            <a href="" class="download-card__link">
              Download Notification <i class="fa-solid fa-download"></i>
            </a>
          </div>
        </div>
    </section>
  </main>
</x-user.layouts.master>