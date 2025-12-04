@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Academics
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Merit List" />
    <section class="academics">
      <div class="container">
        <aside class="navigation">
          <div class="navigation-container">
            <ul class="navigation__list">
              <li class="navigation__item"><a href="{{ route('user.academics') }}" class="go">Academics
                  <span class="icon"></span></a></li>
              <li class="navigation__item"><a href={{ route('user.director.academics') }} class="go">Academic Calendar
                  <span class="icon"></span></a></li>
              <li class="navigation__item"><a href="" class="go">TimeTable <span class="icon"></span></a></li>
              <li class="navigation__item"><a href="" class="go">Capacity Building <span class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
        <div class="content">
          <h1 class="secondary-title">
            Introduction
          </h1>
          <p class="description">
            As Director (Academics), I welcome you to the University of Sahiwal. The Directorate of academics aims to
            develop, review and monitor academic curricula & policies in line with international best practices, market
            needs and requirements of accreditation bodies and ensure their smooth and effective implementation. The
            office of the director academics is the leading office of the university of Sahiwal that falls under the
            office of the Vice Chancellor. The office develops and oversees academic curricula and policies. It
            regularly examines academic curricula for quality academic programmes using a board of studies, a faculty
            board, industrial and market inputs, and so on. Through accreditation bodies, it keeps curricula in line
            with international and national demands and norms. The office’s mission is to execute and uphold the highest
            academic standards for excellence in teaching and learning as established by the academic council and the
            syndicate. It also identifies emerging needs and develops future projections in areas such as curricula,
            teaching methodologies, research activities and capacity building for the faculty and students. In addition,
            the office of the director academics organizes faculty development programs, develop academic calendar, look
            after the matters related to the hiring of the part-time faculty in collaboration with deans and chair
            departments and responds to HEC/PHEC or other organizations’ inquiries on pertinent academic topics.
          </p>
        </div>
    </section>
  </main>
</x-user.layouts.master>