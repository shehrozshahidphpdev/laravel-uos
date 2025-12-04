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
            For Students
          </p>
          <h1 class="main-title">
            VICE CHANCELLOR'S MESSAGE
          </h1>
          <p class="description">
            As Vice Chancellor, I extend a warm welcome to the admission aspirants of the University of Sahiwal. This
            public-sector university is accredited by the Higher Education Commission (HEC) and provides students with
            education in all modern fields. We utilize our immense dedication in ensuring that each individual receives
            an exceptional educational experience which places a strong focus on contemporary trends within their
            respective field of study. Our faculty puts vast effort into providing diligent guidance and oversight
            throughout each student's course of study for maximum success.
            <br>
            I am pleased to announce that our University offers the students excellent and comprehensive educational
            services, as well as a vast selection of extracurricular activities. Our admissions policy ensures equal
            opportunity for all deserving individuals according to their abilities and backgrounds. We are devoted to
            ensuring equity regardless of financial means, social background or ethnicity. Our courses are constructed
            and taught by skilled professionals who recognize the specific requirements of every pupil. Furthermore, we
            offer a variety of possibilities for extracurricular pursuits including sports teams, literary or art
            appreciation societies, in addition to a media club. Our institution is steadfast in its commitment to
            knowledge creation through research and innovation, as well as providing our students with a dynamic
            learning environment. We aspire to cultivate a culture of research and innovation amongst our student body,
            so that they may have access to the most advanced understandings while enrolled here.
            The University of Sahiwal’s modern infrastructural development includes a central mosque, a library with an
            abundance of resources, science and computer-labs, hostels, transportation facilities and sport grounds for
            the students' convenience, in addition to a women development center and technology incubator. It is thus
            unsurprising that we are on the path to becoming one of the most desired universities in Pakistan. Let us
            join forces, and enable these innovations to be spread far and wide. I wish you the utmost success in all
            your endeavors.
          </p>
        </div>
      </div>
    </section>
  </main>
</x-user.layouts.master>