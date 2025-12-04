@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Introduction
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Office" />
    <section class="registrar">
      <div class="container">
        @forelse($administrations as $administration)
          <div class="profiles">
            <div class="profile">
              <a href="">
                @if(isset($administration->image))
                  <img src="{{ asset('storage/admin/uploads/' . $administration->image) }}" alt="Image">
                @else
                  <img src="{{ asset('backend/assets/images/no-img.png') }}" alt="Image">

                @endif
              </a>
            </div>
            <div class="bio">
              <h2 class="name">{{ $administration->name }}</h2>
              <p class="designation">{{ $administration->designation }}</p>
              @if(isset($administration->phone_no))
                <p class="contact"><i class="fa-solid fa-phone"></i>{{ $administration->phone_no }}</p>
              @endif
              <p class="contact"><i class="fa-solid fa-envelope"></i>{{ $administration->email }}</p>
            </div>
          </div>
        @empty
          <h2>Sorry No Data Found</h2>
        @endforelse

      </div>
    </section>
  </main>
</x-user.layouts.master>
