@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Admin - HOD - Computer Science">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Downloads" />
    <section class="main-content">
      <div class="container">
        <div class="hero-content">
          <div class="profile-container">
            <div class="profile">
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
              @isset($profile->position)
                <strong class="others-title"> {{ $profile->position }} </strong>
              @endisset
              <br>
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
              @isset($profile->specialization)
                <strong class="others-title">Specialization</strong>
                <p class="others-text">
                  {{ $profile->specialization }}
                </p>
              @endisset
              @isset($profile->email)
                <p class="social-link">
                  <i class="fa-solid  fa-envelope"></i>
                  <a href="mailto:drshafiq@uosahiwal.edu.pk">
                    {{ $profile->email }}
                  </a>
                </p>
              @endisset

            </div>
          </div>
          <div class="hero-navigation">
            <ul class="hero-navigation__items">
              <li class="hero-navigation__item hero-navigation__item-1">Publications</li>
              <li class="hero-navigation__item hero-navigation__item-2">CV</li>
            </ul>
          </div>

          <section class="sos">
            <h2 class="sos__title">Research Publications</h2>
            <div class="table-container">
              <table class="table">
                <thead class="table-head">
                  <tr>
                    <th><b>List of Authors</b></th>
                    <th><b>Title</b></th>
                    <th><b>Journal</b></th>
                    <th><b>Year</b></th>
                    <th><b>Impact Factor</b></th>
                    <th><b>Category </b></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($publications as $publication)
                    <tr class="odd">
                      <td>{{$publication->authors }}</td>
                      <td>{{ $publication->title }}</td>
                      <td>{{ $publication->journal }}</td>
                      <td>{{ $publication->year }}</td>
                      <td>{{ $publication->impact_factor }}</td>
                      <td>{{ $publication->category }}</td>
                    </tr>
                  @empty
                    <tr class="odd">
                      <h2>Sorry No Data Found!</h2>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </section>
          <section class="cv">
            <h2 class="cv__title">CV</h2>
            <div class="cv-container">
              <iframe src="{{ asset('storage/admin/uploads/' . $profile->cv) }}" frameborder="0" scrolling="auto"
                height="500" width="100%" class="pdfAutoScr">
              </iframe>
            </div>
          </section>
        </div>
        <aside class="navigation">
          <ul class="navigation__list">
            <li class="navigation__item"><a href="{{ route('user.department.departmentPage', 'computer-science') }}"
                class="navigation__link">Department</a></li>
            <li class="navigation__item"><a href="{{ route('user.department.chairmanPage', $slug) }}"
                class="navigation__link">Chairman</a></li>
            <li class="navigation__item"><a href="{{ route('user.department.departmentFaculty', $slug) }}"
                class="navigation__link">Faculty</a></li>
            <li class="navigation__item"><a href="{{ route('user.department.fee-structure', $slug) }}"
                class="navigation__link">Fee Structure</a></li>
          </ul>
        </aside>
      </div>
    </section>
  </main>

</x-user.layouts.master>
