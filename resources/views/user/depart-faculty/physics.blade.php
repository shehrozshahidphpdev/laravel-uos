@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Admin - HOD - Computer Science">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Faculty" />
    <section class="main-content">
      <div class="container">
        <div class="hero-content">
          @forelse($profiles as $profile)
            <div class="profile-container">
              <div class="profile" style="width: 300px">
                <a href="">
                  <img src="{{ asset('storage/admin/uploads/' . $profile->image) }}" alt="">
                </a>
              </div>
              <div class="bio">
                @isset($profile->name)
                  <h2 class="name">
                    {{ $profile->name }}
                  </h2>
                @endisset
                @isset($profile->designation)
                  <strong class="others-title">Designation</strong>
                  <p class="others-text">
                    {{ $profile->designation }}
                  </p>
                @endisset
                @isset($profile->qualification)
                  <strong class="others-title">Qualification</strong>
                  <p class="others-text qualification">
                    {{ $profile->qualification }}
                  </p>
                @endisset
                <a href="{{ route('user.department.showFaculty', ['slug' => $slug, 'id' => $profile->id]) }}"
                  class="details-btn">Detail</a>
              </div>
            </div>
          @empty
            <h2>Sorry No Data Found!</h2>
          @endforelse

        </div>
        <aside class="navigation">
          <ul class="navigation__list">
            <li class="navigation__item"><a href="{{ route('user.department.departmentPage', $slug) }}"
                class="navigation__link">Department</a></li>
            <li class="navigation__item"><a href="{{ route('user.department.chairmanPage', $slug) }}"
                class="navigation__link">Chairman</a></li>
            <li class="navigation__item"><a href="#" class="navigation__link">Faculty</a></li>
            <li class="navigation__item"><a href="#" class="navigation__link">Research Group</a></li>
            <li class="navigation__item"><a href="{{ route('user.department.fee-structure', $slug) }}"
                class="navigation__link">Fee Structure</a></li>
          </ul>
        </aside>
      </div>
    </section>
  </main>

</x-user.layouts.master>
