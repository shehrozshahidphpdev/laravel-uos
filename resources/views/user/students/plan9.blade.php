@props(['settings'])
<x-user.layouts.master :settings="$settings" title="Home Plan 9">
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Plan9" />
    <section class="plan">
      <div class="container">
        <div class="left">
          <aside class="side-card">
            <h1 class="side-card__title">Please use following link to apply</h1>
            <a href="" class="side-card__navigation">
              https://tinyurl.com/RP9StartupLaunchpad
            </a>
          </aside>
          <aside class="side-card">
            <h1 class="side-card__title">For more information please visit</h1>
            <a href="" class="side-card__navigation">
              https://www.plan9.pitb.gov.pk/
            </a>
          </aside>
        </div>
        <section class="main-content">
          <h1 class="main-content__title">REGIONAL PLAN9
          </h1>
          <p class="main-content__description text">
            Are you a startup based in Sahiwal and in search of incubation opportunities? Wait no more. Regional Plan9
            is accepting applications for its first cohort in Sahiwal. It is a project of Punjab Information Technology
            Board (PITB) that is building a network of 9 technology incubation centers across Punjab. Our tech
            incubation center offers startups and aspiring entrepreneurs a 6 month zero equity program with the
            following services:
          </p>

          <ul class="items">
            <li class="item text">Business Development Assistance</li>
            <li class="item text">Monthly Stipend</li>
            <li class="item text">Free Legal Consultation</li>
            <li class="item text">Mentorship</li>
            <li class="item text">Free Legal Consultation</li>
            <li class="item text">Networking Opportunities</li>
          </ul>

        </section>
      </div>
    </section>

  </main>
</x-user.layouts.master>
