@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Introduction
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Office" />
    <section class="vc">
      @forelse ($administrations as $administration)
        <div class="container">
          <div class="profile">
            <a href="">
              @if(isset($administration->image))
                <img src="{{  asset('storage/admin/uploads/' . $administration->image) }}" alt="image">
              @else
                <img src="{{  asset('backend/assets/images/no-img.png') }}" alt="image">
              @endif
            </a>
          </div>
          <div class="bio">
            <h2 class="name">{{ $administration->name }}</h2>
            <p class="designation">{{ $administration->designation }}</p>
            <p class="contact"><i class="fa-solid fa-envelope"></i> {{ $administration->email }}</p>
          </div>
        </div>
      @empty
        <h2>No Data Found!</h2>
      @endforelse
    </section>
  </main>
</x-user.layouts.master>
