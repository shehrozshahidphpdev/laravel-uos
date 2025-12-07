@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home - Prospectus">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Prospectus" />
    <section class="downloads">
      <div class="container">
        <div class="cards-container">
          @forelse  ($downloads as $download)
            <div class="download-card" style="width: 300px">
              <p class="download-card__caption">{{ $download->title }}</p>
              <a href="{{ asset('storage/admin/uploads/' . $download->file) }}" class="download-card__link">
                Download <i class="fa-solid fa-download"></i>
              </a>
            </div>
          @empty
            <h2>Sorry No Data Found!</h2>
          @endforelse
        </div>
    </section>
  </main>
</x-user.layouts.master>
