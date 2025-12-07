@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home - Yransportation">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Transport" />
    <section class="transportation">
      <div class="container">
        <div class="left">
          <aside class="navigation">
            <div class="navigation-container">
              <ul class="navigation__list">
                <li class="navigation__item"><a href="" class="go">Transport <span class="icon"></span></a></li>
              </ul>
            </div>
          </aside>

          <aside class="transport">
            <div class="transport-container">
              <p class="caption">Transport Forms</p>
              <ul class="transport__list">
                @foreach ($files as $file)
                  <li class="transport__item"><a href="{{ asset('storage/admin/uploads/' . $file->file) }}"
                      target="_blank" class="go"> <span class="icon"></span> {{ $file->title }}</a>
                  </li>
                @endforeach
              </ul>
            </div>
          </aside>
        </div>
        <section class="main-content">
          <h1 class="main-content__title">Bus Service</h1>
          <p class="text">The University is starting its Transport Service to the following cities on non-profit base:
          </p>
          <ul class="items">
            <li class="item text">Chichawatni (via Harappa)</li>
            <li class="item text">pakpattan</li>
            <li class="item text">okara (Via qadarabad)</li>
            <li class="item text">Arifwala</li>
          </ul>
          <h2 class="main-content__subtitle">
            Bus Charges
          </h2>
          <p class="main-content-description text">
            The bus charges per student are Rs. 5,000 per semester for outside routes (Pakpattan, Arifwala, Chichawatni
            and Okara) and Rs. 3,000 per semester for students within Sahiwal city. Transport forms can be obtained from
            university photocopy shops or downloaded from University of Sahiwal website: http://www.uosahiwal.edu.pk.
            Students who wish to use university transport for the above-mentioned cities must fill out the transport
            form and submit it to the Transport Office in the Student Service Center (Room 5.G.1).
          </p>
        </section>
      </div>
    </section>
  </main>
</x-user.layouts.master>
