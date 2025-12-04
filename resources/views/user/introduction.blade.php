@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Introduction
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Contact Us" />
    <section class="featured">
      <div class="container">
        <div class="profile">
          <img src="{{ asset('backend/assets/images/dummy.png') }}" alt="profile">
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
            The University of Sahiwal, established in 2016, serves as a prominent Higher Education Institute (HEI) in
            the Sahiwal region. Formerly a Bahauddin Zakariya University (BZU) sub-campus, it has evolved into a
            fully-fledged divisional university. Located in the heart of Sahiwal, the university caters to approximately
            7,000 students. It offers a diverse range of academic programs, encompassing morning and self-support
            classes across 10 distinct academic departments. These programs include undergraduate, graduate and
            postgraduate levels, ensuring a comprehensive educational experience for its students.
            The administrative structure of the University of Sahiwal is robust and efficient, facilitating smooth
            operations across various functions. Additionally, the university hosts some of the provincial and
            divisional centers, including the Women Development Center and the Punjab Information Technology Board's
            (PITB) Regional Plan9, which contribute to community development initiatives. To further enhance its
            infrastructure, construction work on multiple academic and administrative blocks is currently underway as
            part of a Higher Education Commission (HEC) development project. This expansion reflects the university's
            commitment to providing quality education and resources for its students.
          </p>
        </div>
      </div>
    </section>
    <section class="others">
      <div class="container">
        <h1 class="title">Vision, Mission and Values of University of Sahiwal</h1>
        <div class="panel">
          <span class="key">Vision</span>
          <div class="chevron">
            <i class="fa-solid fa-chevron-left"></i>
          </div>
        </div>
        <div class="panel-content">
          To be the region’s leading university for promoting quality education, research and socio-economic
          development.
        </div>

        <div class="panel">
          <span class="key">Mission</span>
          <div class="chevron">
            <i class="fa-solid fa-chevron-left"></i>
          </div>
        </div>
        <div class="panel-content">
          he university aims to:
          <br>
          a) Cultivate a culture of high-quality education and research through continuous training and development of
          faculty members to address local and global challenges.
          <br>
          b) Equip students with the necessary skills to adapt to the modern workplace dynamics.
          <br>
          c) Engage local communities and promote sustainable practices.

        </div>

        <div class="panel">
          <span class="key">Values</span>
          <div class="chevron">
            <i class="fa-solid fa-chevron-left"></i>
          </div>
        </div>
        <div class="panel-content">
          To be the region’s leading university for promoting quality education, research and socio-economic
          development.
        </div>
      </div>
    </section>
  </main>
</x-user.layouts.master>
