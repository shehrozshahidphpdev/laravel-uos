@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Academics
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Scholarships" />
    <section class="scholarships">
      <div class="container">
        <aside class="navigation">
          <div class="navigation-container">
            <ul class="navigation__list">
              <li class="navigation__item"><a href="" class="go">DSA Office <span class="icon"></span></a></li>
              <li class="navigation__item "><a href="{{ route('user.dsa-downloads') }}" class="go">Download Forms <span
                    class="icon"></span></a>
              </li>
              <li class="navigation__item"><a href="{{ route('user.scholarships') }}" class="go">Scholarships <span
                    class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
        <section class="main-content">
          <h1 class="main-content__title">Scholarships Awareness</h1>

          <h2 class="main-content__subtitle">Chief Minister Honhaar Undergraduate Scholarship Program</h2>

          <div class="main-content__scenery">
            <img src="{{ asset('backend/assets/images/no-img.png') }}" alt="image">
          </div>

          <ul class="main-content__points">
            <li class="main-content__point">
              <span class="text">Newly enrolled students and those from 2nd to 8th semester are eligible to
                apply.</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">Only deserving candidates can apply.</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">Website: honhaarscholarship.punjabhec.gov.pk/register.php</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text"><a href="#">Click here to apply</a></span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text"><a href="#">Click here to download application form</a></span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
          </ul>

          <div class="main-content__scenery">
            <iframe height="300" width="100%" src="https://www.youtube.com/embed/MJI7d4riZ4M"></iframe>
          </div>

          <h2 class="main-content__keytitle">Ushar Zakat Scholarship</h2>

          <ul class="main-content__points">
            <li class="main-content__point">
              <span class="text">Deserving candidates can apply.</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">Only Morning students are eligible.</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
          </ul>

          <h2 class="main-content__keytitle">Need-Based Scholarship</h2>

          <ul class="main-content__points">
            <li class="main-content__point">
              <span class="text">Only Morning students can apply for this scholarship.</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">Students must provide documentary proof of financial need.</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">Forms are available in the department. Submit the completed form along with required
                documents.</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">Scholarships are awarded to 10% of the total class after an interview conducted by the
                HOD.</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
            <li class="main-content__point">
              <span class="text">Students can apply from the 2nd semester onward.</span>
              <span class="icon"><i class="fa-solid fa-check"></i></span>
            </li>
          </ul>

        </section>
      </div>
    </section>
  </main>
</x-user.layouts.master>
