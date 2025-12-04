@props(['settings'])
<x-user.layouts.master :settings="$settings" title="home director-planning-development">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Directorate" />
    <section class="persons">
      <div class="container">
        <div class="profiles-container">
          @forelse($directorates as $directorate)
            <div class="profiles">
              <div class="profile">
                <a href="#">
                  @if(isset($directorate->image))
                    <img src="{{asset('storage/admin/uploads/' . $directorate->image)}}" alt="image">
                  @else
                    <img src="{{ asset('backend/assets/images/dummy.png') }}" alt="image">
                  @endif
                </a>
              </div>
              <div class="bio">
                <h2 class="name">{{ $directorate->name }}</h2>
                <p class="designation">{{ $directorate->designation }}</p>
                <p class="contact"><i class="fa-solid fa-phone"></i> {{ $directorate->phone_no }}</p>

                <p class="contact"><i class="fa-solid fa-envelope"></i>{{ $directorate->email }}</p>
              </div>
            </div>
          @empty
            <h2>Sorry! No Data Found</h2>
          @endforelse
        </div>

      </div>
    </section>
  </main>
</x-user.layouts.master>
