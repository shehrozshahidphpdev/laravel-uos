@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home coursera">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Plan9" />
    <section class="digital-learning">
      <div class="container">
        <h1 class="title">
          DIGITAL LEARNING & SKILL ENRICHMENT INITIATIVE (DLSEI-COURSERA) 2023
        </h1>
        <div class="main-content-container">
          <div class="main-content">
            <h2 class="main-content__title">
              HIGHER EDUCATION COMMISSION OF PAKISTAN IS NOW OFFERING FREE COURSERA LICENSES TO THE STUDENTS AND FACULTY
              OF UNIVERSITY OF SAHIWAL.
            </h2>
            <p class="main-content__description text">
              The Digital Learning & Skills Enrichment Initiative (DLSEI) is an initiative of the Higher Education
              Commission (HEC) Pakistan in partnership with Coursera. DLSEI intends to enhance online learning and
              skills development among passionate students. They will be able to access courses and certifications from
              top universities of the world and get an opportunity to enroll themselves in the highest-ranked and most
              expensive online courses.
              The infrastructure of the Digital Learning & Skills Enrichment Initiative (DLSEI) to be provided by
              Coursera will help in the practical training of the youth enabling them to seek employment in the national
              and international market. DLSEI will serve, as an online platform to include learners from all over
              Pakistan, be part of this great initiative, and enable them to take advantage of the opportunity. Learners
              will be equipped with the most demanded learning tracks, which would enable the learners to show case
              their talent and skills, and the learners can create their businesses through self-employment and
              entrepreneurship initiatives.
            </p>
            <ul class="main-content__points">
              <li class="main-content__point">
                <span class="text">click here to download application form: <a href=""
                    class="main-content__point-link">Click Me</a></span>
                <span class="icon"><i class="fa-solid fa-check"></i></span>
              </li>
              <li class="main-content__point">
                <span class="text">click here to download application form: <a href=""
                    class="main-content__point-link">Click Me</a></span>
                <span class="icon"><i class="fa-solid fa-check"></i></span>
              </li>
              <li class="main-content__point">
                <span class="text">click here to download application form: <a href=""
                    class="main-content__point-link">Click Me</a></span>
                <span class="icon"><i class="fa-solid fa-check"></i></span>
              </li>
              <li class="main-content__point">
                <span class="text">click here to download application form: <a href=""
                    class="main-content__point-link">Click Me</a></span>
                <span class="icon"><i class="fa-solid fa-check"></i></span>
              </li>
              <li class="main-content__point">
                <span class="text">click here to download application form: <a href=""
                    class="main-content__point-link">Click Me</a></span>
                <span class="icon"><i class="fa-solid fa-check"></i></span>
              </li>

            </ul>
          </div>
          <div class="side-poster">
            <img src="{{ asset('user/assets/images/era-1.jpg')}}" alt="side-poster">
          </div>
        </div>
        <div class="main-poster">
          <img src="{{ asset('user/assets/images/era-2.jpg') }}" alt="group-poster-1">
        </div>
      </div>
    </section>

  </main>
</x-user.layouts.master>
