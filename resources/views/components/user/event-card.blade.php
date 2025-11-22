
@props([
  'event'
])

<div class="event__cards">
  <a href="{{ route('user.show-event', $event->slug) }}">
    <img src="{{ asset('storage/admin/uploads/' . $event->poster) }}" alt="image">
  </a>
   <div class="event__cards-date">
      <strong> {{ $event->created_at->format('d') }} </strong> <br />
      {{ \Carbon\Carbon::parse($event->created_at)->format('M') }}

   </div>
   <div class="event__cards-description">
      <p>
         <a class="navigate" href="{{ route('user.show-event', $event->slug) }}">
         {{ Str::limit(strip_tags($event->description), 50) }}
      </a>
        </p>
   </div>
</div>
