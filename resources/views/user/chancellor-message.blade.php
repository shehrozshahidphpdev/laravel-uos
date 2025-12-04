@props(['settings', 'banner'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Introduction
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Chancellors Message" />
    <section class="featured">
      <div class="container">
        <div class="chancellor__profile">
          <div class="chancellor__profile-pic">
            <img src="{{asset('backend/assets/images/dummy.png')}}" alt="">
            {{-- <img src="{{asset('bacg')}}" alt=""> --}}
          </div>
          <div class="chancellor__profile-description">
            <p class="name">PROF. DR James Daniel</p>
            <p class="designation">Vice Chancellor</p>
            <p class="University of Sahiwal">
              University of Sahiwal
            </p>
          </div>
        </div>
        <div class="content">
          <p class="mini-title">
            <i class="fa-solid fa-graduation-cap"></i>
            About University
          </p>
          <h1 class="main-title">
            Introduction
          </h1>
          <p class="description">
            I am delighted to extend my congratulations to the leadership, faculty and students of University of Sahiwal
            as they prepare for a new academic session. The upcoming academic year holds tremendous opportunities for
            growth and excellence. University of Sahiwal's commitment to innovative teaching methods and cutting- edge
            research in various fields is commendable. Faculty members are continuously enhancing their skills and
            expertise to provide students with the best education possible. The university's dedication to modernizing
            its infrastructure ensures that students have access to top-notch facilities for their studies. As
            Chancellor, I am confident that students at University of Sahiwal will have a fulfilling learning experience
            on the vibrant Green-Campus. Best wishes for the success of the new academic year ahead!
          </p>
        </div>
      </div>
    </section>
  </main>
</x-user.layouts.master>