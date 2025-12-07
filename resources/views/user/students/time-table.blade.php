@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Academics
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Time Table" />
    <section class="time-table">
      <div class="container">
        @forelse($timeTables as $timeTable)
          <div class="card">
            <p class="card__caption">{{ $timeTable->title }}</p><a
              href="{{ asset('storage/admin/uploads/' . $timeTable->file) }}" target="_blank" class="card__link">Fall
              Semester
              {{ $timeTable->created_at->format('Y') }}
              <i class="fa-solid fa-download"></i></a>
          </div>
        @empty
          <h2>Sorry No Data Found</h2>
        @endforelse

    </section>
  </main>
</x-user.layouts.master>
