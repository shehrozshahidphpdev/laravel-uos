@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Notifications
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="notifications" />
    <section class="downloads">
      <div class="container">
        <aside class="navigation">
          <div class="navigation-container">
            <ul class="navigation__list">
              <li class="navigation__item"><a href="{{ route('user.news') }}" class="go">News <span
                    class="icon"></span></a></li>
              <li class="navigation__item "><a href="{{ route('user.notifications') }}" class="go">Notifications <span
                    class="icon"></span></a>
              </li>
              <li class="navigation__item"><a href="{{ route('user.notifications') }}" class="go">Download Forms <span
                    class="icon"></span></a></li>
              <li class="navigation__item"><a href="{{ route('user.scholarships') }}" class="go">Scholarships <span
                    class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
        <div class="cards-container">
          @foreach($downloads as $download)
            <div class="download-card">
              <p class="download-card__caption">{{ $download->title }}</p>
              <a href="{{ asset('storage/admin/uploads/' . $download->file) }}" target="_blank"
                class="download-card__link">
                Download Notification <i class="fa-solid fa-download"></i>
              </a>
            </div>
          @endforeach

        </div>
    </section>
  </main>
</x-user.layouts.master>
