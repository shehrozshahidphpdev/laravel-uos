@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    {{-- here dynamic title goes --}}
    Home Page
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner title="{{ $thisNews->title }}" navigation="News Details" />

    <section class="single-news">
      <div class="container">
        <div class="main-area">
          <h2 class="title">
            {{ $thisNews->title }}
          </h2>
          @if(isset($thisNews->image))
            <div class="main-banner">
              <img class="main-img" src="{{ asset('storage/admin/uploads/' . $thisNews->image) }}" alt="main-banner">
            </div>
          @endif
          <div class="description">
            {!! $thisNews->description !!}
          </div>
        </div>
        <aside class="news-sidebar">
          <h6 class="title">
            Recent News
          </h6>
          <nav class="news-navigation">
            <ul class="news-items">
              @foreach ($allnews as $news)
                <li class="news-item"><a href="{{ route('user.show-news', $news->slug) }}">{{ $news->title }}</a></li>
              @endforeach
            </ul>
          </nav>
        </aside>
      </div>
    </section>
  </main>
</x-user.layouts.master>
