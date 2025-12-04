@props(['settings'])
<x-user.layouts.master :settings="$settings" title="{{ $thisEvent->slug }}">
  @push('styles')
    <style>
      .other-images {
        display: flex;
        gap: 2rem;
        justify-content: space-between;
      }

      .other-img {
        max-height: 200px;
        max-width: 100%;
        width: 100%;
      }
    </style>
  @endpush
  <main class="main">
    <x-user.event-banner title="{{ $thisEvent->title }}" navigation="Event Details" />
    <section class="single-news">
      <div class="container">
        <div class="main-area">
          @if(isset($thisEvent->poster))
            <div class="main-banner">
              <img class="main-img" src="{{ asset('storage/admin/uploads/' . $thisEvent->poster) }}" alt="main-banner"
                style="height: 500px">
            </div>
          @endif
          <h2 class="title">
            {{ $thisEvent->title }}
          </h2>
          <div class="description">
            {!! $thisEvent->description !!}
          </div>
          <div class="other-images">
            @foreach($thisEvent->images as $image)
              <img class="other-img" src="{{ asset('storage/admin/uploads/' . $image) }}" class="img-fluid rounded-top"
                alt="other_images" />
            @endforeach
          </div>
        </div>
        <aside class="news-sidebar">
          <h6 class="title">
            Recent Events
          </h6>
          <nav class="news-navigation">
            <ul class="news-items">
              @foreach ($allEvents as $event)
                <li class="news-item"><a href="{{ route('user.show-event', $event->slug) }}">{{ $event->title }}</a></li>
              @endforeach
            </ul>
          </nav>
        </aside>
      </div>
    </section>
  </main>
</x-user.layouts.master>