<x-user.layouts.master>
  <x-slot:title>
    Home Page
  </x-slot:title>

  <!-- hero caraousal section -->
  <section class="hero">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="{{ asset('user/assets/images/hero-1.png') }}" alt="hero-photo">
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('user/assets/images/hero-2.jpg') }}" alt="hero-photo">
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('user/assets/images/hero-3.jpg') }}" alt="hero-photo">
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  <!-- hero section cards -->
  <section class="hero__cards">
    <div class="container">
      <div class="hero__card hero__card-1">
        <div class="hero__card-content">
          <img src="{{ asset('user/assets/images/dep-logopng.png') }}" alt="dep-logo">
          <a href="">Department</a>
        </div>
      </div>
      <div class="hero__card hero__card-2">
        <div class="hero__card-content">
          <img src="{{ asset('user/assets/images/book-logo.png') }}" alt="">
          <a href="">Academics</a>
        </div>
      </div>
      <div class="hero__card hero__card-3">
        <div class="hero__card-content">
          <img src="{{ asset('user/assets/images/dunmbell-logo.png') }}" alt="">
          <a href="">ORIC</a>
        </div>
      </div>
      <div class="hero__card hero__card-4">
        <div class="hero__card-content">
          <img src="{{ asset('user/assets/images/building-logo.png') }}" alt="">
          <a href="">QEC</a>
        </div>
      </div>
    </div>
  </section>

  <!-- events cards -->
  <section class="events">
    <div class="container">
      <div class="events-header">
        <div class="events__title"> <i class="fa-solid fa-graduation-cap"></i>Events Gallery</div>
        <h1 class="events__title-jumbo">Our Events</h1>
      </div>
      <div class="event__cards-container">
        <x-user.event-card />
        <x-user.event-card />
        <x-user.event-card />
      </div>
    </div>
    <div class="event-button">
      <a href="">
        All Events
        <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </section>
  <!-- chancellor section -->
  <section class="chancellor">
    <div class="container">
      <div class="chancellor__profile">
        <div class="chancellor__profile-pic">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxYA4yTn5sczM4j6psN48F0zJk8zELz2nT4A&s"
            alt="">
        </div>
        <div class="chancellor__profile-description">
          <p class="name">PROF. DR James Daniel</p>
          <p class="designation">Vice Chancellor</p>
          <p class="University of Sahiwal">
            University of Sahiwal
          </p>
        </div>
      </div>
      <div class="chancellor__message">
        <p class="chancellor__message-mini">
          <i class="fa-solid fa-graduation-cap"></i>
          For Students
        </p>
        <h1 class="chancellor__message-title">
          VICE CHANCELLOR'S MESSAGE
        </h1>
        <p class="chancellor__message-description">
          As Vice Chancellor, I extend a warm welcome to the admission aspirants of the University of Sahiwal.
          This
          public-sector university is accredited by the Higher Education Commission (HEC) and provides
          students with
          education in all modern fields. We utilize our immense dedication in ensuring that each individual
          receives an
          exceptional educational experience which places a strong focus on contemporary trends within their
          respective
          field of study. Our faculty puts vast effort into providing diligent guidance and oversight
          throughout each
          student's course of study for maximum success.
          <br>
          I am pleased to announce that our University offers the students excellent and comprehensive
          educational
          services, as well as a vast selection of
        </p>
      </div>
    </div>
  </section>

  <!-- news swiper section  -->
  <section class="news-section">
    <div class="container">
      <div class="news-header">
        <div class="titles-box">
          <p class="mini-title">
            <i class="fa-solid fa-graduation-cap"></i> Latest
          </p>
          <p class="main-title">News & Notices</p>
        </div>
        <div class="news-btns-group">
          <button class="news-btn"><i class="fa-solid fa-chevron-left"></i></button>
          <button class="news-btn"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
      </div>

      <div class="swiper news-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide news-card">
            <div class="news-card-content">
              <h1 class="news-title">Extension of Fee Submission</h1>
              <p>Extension of fee submission for 3rd, 5th and 9th semester</p>
              <span class="news-title-link">
                <a href="">Click Here <i class="fa-solid fa-arrow-right"></i>
                </a></span>
            </div>
          </div>
          <div class="swiper-slide news-card">
            <div class="news-card-content">
              <h1 class="news-title">Extension of Fee Submission</h1>
              <p>Extension of fee submission for 3rd, 5th and 9th semester</p>
              <span class="news-title-link">
                <a href="">Click Here <i class="fa-solid fa-arrow-right"></i>
                </a></span>
            </div>
          </div>
          <div class="swiper-slide news-card">
            <div class="news-card-content">
              <h1 class="news-title">Extension of Fee Submission</h1>
              <p>Extension of fee submission for 3rd, 5th and 9th semester</p>
              <span class="news-title-link">
                <a href="">Click Here <i class="fa-solid fa-arrow-right"></i>
                </a></span>
            </div>
          </div>
          <div class="swiper-slide news-card">
            <div class="news-card-content">
              <h1 class="news-title">Extension of Fee Submission</h1>
              <p>Extension of fee submission for 3rd, 5th and 9th semester</p>
              <span class="news-title-link">
                <a href="">Click Here <i class="fa-solid fa-arrow-right"></i>
                </a></span>
            </div>
          </div>
          <div class="swiper-slide news-card">
            <div class="news-card-content">
              <h1 class="news-title">Extension of Fee Submission</h1>
              <p>Extension of fee submission for 3rd, 5th and 9th semester</p>
              <span class="news-title-link">
                <a href="">Click Here <i class="fa-solid fa-arrow-right"></i>
                </a></span>
            </div>
          </div>
          <div class="swiper-slide news-card">
            <div class="news-card-content">
              <h1 class="news-title">Extension of Fee Submission</h1>
              <p>Extension of fee submission for 3rd, 5th and 9th semester</p>
              <span class="news-title-link">
                <a href="">Click Here <i class="fa-solid fa-arrow-right"></i>
                </a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="news-button">
      <a href="#" class="all-news">
        All News <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </section>

  <!-- depratments cards -->
  <section class="department">
    <div class="container">
      <div class="department__header">
        <p class="department__header-minititle"> <i class="fa-solid fa-graduation-cap"></i> Programs</p>
        <h1 class="department__header-maintitle">Departments</h1>
      </div>
      <div class="department__cards-container">
        @foreach ($departments as $department)
          <article class="department__card">
            <div class="department__card-header">
              <img src="{{ asset('storage/admin/uploads/' . $department->image) }}" class="" alt="" />
            </div>
            <div class="department__card-content">
              <p class="department__card-content-title">
                {{ $department->dept_name }}
              </p>
              <p class="department__card-content-description">
                @foreach ($department->offered_courses as $course)
                  {{ $course }}
                  <br>
                @endforeach
                {{-- BS Applied Psychology (4 Years)
                ADCP (1 Year)
                MS Clinical Psychology --}}
              </p>
              <span class="department__card-content-footer">
                <a href="">Detail</a>
                <i class="fa-solid fa-arrow-right"></i>
              </span>
            </div>
          </article>
        @endforeach

        {{-- <article class="department__card">
          <div class="department__card-header">
            <img src="public\assets\imgs\department\\cs-322a (1).jpg" class="" alt="" />
          </div>
          <div class="department__card-content">
            <p class="department__card-content-title">
              Business Administration
            </p>
            <p class="department__card-content-description">
              BBA (4 Years)
              BBIS (4 Years)
              EMBA (Executive) (2 Years)
              MS Business Administration
              PhD Business Administration
            </p>
            <span class="department__card-content-footer">
              <a href="">Detail</a>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </div>
        </article>
        <article class="department__card">
          <div class="department__card-header">
            <img src="public\assets\imgs\department\\englash-22.jpg" class="" alt="" />
          </div>
          <div class="department__card-content">
            <p class="department__card-content-title">
              Chemistry
            </p>
            <p class="department__card-content-description">
              BS Chemistry (4 Years)
              BS Applied Chemistry (4 Years)
              MPhil Chemistry
              PhD Chemistry
            </p>
            <span class="department__card-content-footer">
              <a href="">Detail</a>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </div>
        </article>
        <article class="department__card">
          <div class="department__card-header">
            <img src="public\assets\imgs\department\\stat (1).jpg" class="" alt="" />
          </div>
          <div class="department__card-content">
            <p class="department__card-content-title">
              Commerce
            </p>
            <p class="department__card-content-description">
              BS Commerce (4 Years)
              BS Accounting & Finance (4 Years)
              BS Banking & Finance (4 Years)
            </p>
            <span class="department__card-content-footer">
              <a href="">Detail</a>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </div>
        </article>
        <article class="department__card">
          <div class="department__card-header">
            <img src="public\assets\imgs\department\\cs-322a.jpg" class="" alt="" />
          </div>
          <div class="department__card-content">
            <p class="department__card-content-title">
              Computer Science
            </p>
            <p class="department__card-content-description">
              BS Computer Science
            </p>
            <span class="department__card-content-footer">
              <a href="">Detail</a>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </div>
        </article>
        <article class="department__card">
          <div class="department__card-header">
            <img src="public\assets\imgs\department\\stat (1).jpg" class="" alt="" />
          </div>
          <div class="department__card-content">
            <p class="department__card-content-title">
              Economics
            </p>
            <p class="department__card-content-description">
              BS Economics (4 Years)
              MPhil Economics
            </p>
            <span class="department__card-content-footer">
              <a href="">Detail</a>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </div>
        </article>
        <article class="department__card">
          <div class="department__card-header">
            <img src="public\assets\imgs\department\\englash-22.jpg" class="" alt="" />
          </div>
          <div class="department__card-content">
            <p class="department__card-content-title">
              English
            </p>
            <p class="department__card-content-description">
              BS English (4 Years)
              MPhil English
            </p>
            <span class="department__card-content-footer">
              <a href="">Detail</a>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </div>
        </article>
        <article class="department__card">
          <div class="department__card-header">
            <img src="public\assets\imgs\department\\lwa-321.jpg" class="" alt="" />
          </div>
          <div class="department__card-content">
            <p class="department__card-content-title">
              Law
            </p>
            <p class="department__card-content-description">
              LLB (5 Years) <br>
              LLM
            </p>
            <span class="department__card-content-footer">
              <a href="">Detail</a>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </div>
        </article>
        <article class="department__card">
          <div class="department__card-header">
            <img src="public\assets\imgs\department\\psychology-11jpg.jpg" class="" alt="" />
          </div>
          <div class="department__card-content">
            <p class="department__card-content-title">
              Mathematics
            </p>
            <p class="department__card-content-description">
              BS Mathematics (4 Years)
            </p>
            <span class="department__card-content-footer">
              <a href="">Detail</a>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </div>
        </article>
        <article class="department__card">
          <div class="department__card-header">
            <img src="public\assets\imgs\department\chemistry-32.jpg" class="" alt="" />
          </div>
          <div class="department__card-content">
            <p class="department__card-content-title">
              Physics
            </p>
            <p class="department__card-content-description">
              BS Physics (4 Years)
              BS Electronics (4 Years)
              MPhil Physics
            </p>
            <span class="department__card-content-footer">
              <a href="">Detail</a>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </div>
        </article> --}}
      </div>
    </div>
  </section>
  <!-- scholarship banner section  -->
  <section class="scholarship__banner"
    style="background-image: url({{ asset('user/assets/images/scholarship-banner.jpg') }})">
    <div class="container">
      <div class="content">
        <h1 class="title">
          Scholarship Programs
        </h1>
        <p class="description">
          The Directorate of Students Affairs (DSA) works enthusiastically to coordinate the various aspects
          of
          students' life, generating a liaison between students, faculty, and university administration.
        </p>
      </div>
      <div class="btn">
        <a href="" class="btn">Financial Aid <i class="fa-solid fa-arrow-right"></i> </a>
      </div>
    </div>
  </section>
  <!-- before footer cards  -->
  <section class="mail">
    <div class="container">
      <div class="mail__cards">
        <div class="mail__card">
          <p class="mail__card-title">Media Gallery</p>
          <p class="mail__card-person-name">DR. MUHAMMAD AYYOUB</p>
          <span class="mail__card-description">Focal Person for Media Affairs</span>
          <span class="mail__card-description">For matters pertaining to media.</span>
          <p class="mail__card-email">
            <a href="">
              <i class="fa-solid fa-envelope"></i>
              media@uosahiwal.edu.pk
          </p>
          </a>
        </div>
        <div class="mail__card">
          <p class="mail__card-title">Enrolled Students</p>
          <span class="mail__card-description">For queries related to enrolled students.</span>
          <p class="mail__card-email">
            <a href="">
              <i class="fa-solid fa-envelope"></i>
              dsa@uosahiwal.edu.pk
          </p>
          </a>
        </div>
        <div class="mail__card">
          <p class="mail__card-title">Admission Help Desk</p>
          <span class="mail__card-description">
            For queries related to admissions
          </span>
          <span class="mail__card-description">For matters pertaining to media.</span>
          <p class="mail__card-email">
            <a href="">
              <i class="fa-solid fa-envelope"></i>
              admission@uosahiwal.edu.pk
          </p>
          </a>
        </div>
      </div>
    </div>
  </section>
</x-user.layouts.master>
