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
              <li class="navigation__item"><a href="{{ route('user.qec') }}" class="go">QEC Office
                  <span class="icon"></span></a></li>
              <li class="navigation__item"><a href={{ route('user.director.academics') }} class="go">QEC Objectives
                  <span class="icon"></span></a></li>
              <li class="navigation__item"><a href="{{ route('user.qec') }}" class="go">QEC Organogram <span
                    class="icon"></span></a></li>
              <li class="navigation__item"><a href="{{ route('user.qecteam') }}" class="go">QEC Team <span
                    class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
        <div class="content">
          <h1 class="secondary-title">
            QUALITY ENHANCEMENT CELL (QEC)
          </h1>
          <p class="description">
            The Quality Enhancement Cell (QEC) has been established under the directives of the Higher Education
            Commission (HEC).
          </p>

          <h1 class="tertiary-title">
            DIRECTOR'S MESSAGE
          </h1>
          <p class="description">
            As a Director of Quality Enhancement Cell (QEC), University of Sahiwal, I welcome you to this prestigious
            educational institution. I hope during your stay in the university, you will have a good time with us and it
            enable you to acquiring necessary knowledge, skills, attitude and behavior to become a successful
            professional. The department of QEC is playing a vital role in the development of university. I want to
            inform you about the role of QEC and its activities as well as want to let you know about your vital part in
            the course of quality assurance. The Higher Education Commission of Pakistan since its inception in 2002 has
            been striving hard to improve the standard of higher education. One of the major challenges the tertiary
            education system of Pakistan is facing is “quality of teaching and research conditions. Mission of the
            Higher Education Commission is to make concerted efforts to improve the quality of higher education and to
            move university education to meet international standards in the provision of high-quality teaching,
            learning, research and service. HEC executes its policies through Quality Enhancement Cells [QEC],
            established in universities/ Higher Education Institutes [HEIs], in Pakistan. Quality Enhancement Cell,
            alongside undertaking many other measures for enhancing academic quality in HEIs, also implements quality
            assessment mechanism of academic programs, called Self-Assessment Process. The outcome of this process is
            Self-Assessment Report [SAR]. Student is an important participant in the process as well. Students’ feedback
            always contributes a lot in achieving the ultimate goals of outcome-based education.
          </p>
        </div>
    </section>
  </main>
</x-user.layouts.master>