@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - News
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="News" />
    <section class="news">
      <div class="container">
        <div class="news__card-container">
          @foreach ($allNews as $news)
            <div class="news__card">
              <h3 class="news__card-title">
                <a href="{{ route('user.show-news', $news->slug) }}" class="card-title">
                  {{ $news->title }}
                </a>
              </h3>
              <div class="event__card-description">
                <p>
                  {{ Str::limit(strip_tags($news->description, 50)) }}
                </p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  </main>
</x-user.layouts.master>