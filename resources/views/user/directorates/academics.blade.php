@props(['settings'])
<x-user.layouts.master :settings="$settings" title="home academics">
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
            <h2>Sorry! No Data</h2>
          @endforelse
        </div>
        <aside class="navigation">
          <div class="navigation-container">
            <ul class="navigation__list">
              <li class="navigation__item"><a href="{{ route('user.academics') }}" class="go">Academic Office
                  <span class="icon"></span></a></li>
              <li class="navigation__item"><a href="{{ route('user.director.academics') }}" class="go">Academic Calendar
                  <span class="icon"></span></a></li>
              <li class="navigation__item"><a href="" class="go">TimeTable <span class="icon"></span></a></li>
              <li class="navigation__item"><a href="" class="go">Capacity Building <span class="icon"></span></a></li>
              <li class="navigation__item"><a href="" class="go">Prospectus <span class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
      </div>
    </section>
  </main>
</x-user.layouts.master>