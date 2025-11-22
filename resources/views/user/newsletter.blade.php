@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Vc-Message
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner title="Newsletter
" navigation="NewsLetter
" />
    <section class="map">
      <div class="container">
        <div class="newsletter__card">
          <img src="{{ asset('user/assets/images/newsletter-03.png') }}" alt="news letter">
          <div class="newsletter__card-date">
            Volume 03, <br /> Issue 01
          </div>
          <div class="newsletter__card-description">
            <p>
              Newsletter 2023
            </p>
            <div class="btn">
              <a href="#"> Download <i class="fa-solid fa-download"></i> </a>
            </div>
          </div>
        </div>

      </div>
    </section>
  </main>
</x-user.layouts.master>
