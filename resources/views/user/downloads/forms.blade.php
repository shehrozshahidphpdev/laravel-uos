@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home Downloads">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Downloads" />
    <section class="downloads">
      <div class="container">
        <aside class="navigation">
          <div class="navigation-container">
            <ul class="navigation__list">
              <li class="navigation__item"><a href="" class="go">DSA Office <span class="icon"></span></a></li>
              <li class="navigation__item "><a href="" class="go">Download Forms <span class="icon"></span></a>
              </li>
              <li class="navigation__item"><a href="" class="go">Scholarships <span class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
        <div class="cards-container">
          @foreach ($downloads as $download)
            <div class="download-card">
              <p class="download-card__caption">{{ $download->title }}</p>
              <a href="{{ asset('storage/admin/uploads/' . $download->file) }}" target="_blank"
                class="download-card__link">
                Download Word File <i class="fa-solid fa-download"></i>
              </a>
            </div>
          @endforeach
        </div>
    </section>
  </main>
</x-user.layouts.master>
