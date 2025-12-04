@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Events
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Our Events" />
    <section class="events">
      <div class="container">
        <div class="event__cards-container">
          <!-- component goes here  -->
          @foreach ($events as $event)
            <x-user.event-card :event="$event" />
          @endforeach
        </div>
      </div>
    </section>
  </main>
</x-user.layouts.master>