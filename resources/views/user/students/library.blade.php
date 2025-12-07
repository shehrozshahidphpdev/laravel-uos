@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Academics
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Library" />
    <section class="time-table">
      <div class="container">
        <aside class="side-card">
          <h1 class="side-card__title">CLICK HERE FOR DOWNLOAD BOOKS</h1>
          <a href="" class="side-card__navigation">
            Click Here
          </a>
        </aside>
        <section class="main-content">
          <h1 class="main-content__title">Welcome to Library Information Services, University of Sahiwal.</h1>
          <p class="main-content__description text">
            We provide diverse and user-focused services and collections in an inviting, collaborative and innovative
            learning environment. Library team is helping all the relevant stakeholders to locate, select and acquire
            the information which you need from what may seem like a rather daunting mountain of material.br> By
            combining the latest information technology, the staff builds and maintains a rich information environment,
            facilitates access to it, and creates a place that functions as a hub of University of Sahiwal scholarly
            activity where students, academic staff and researchers meet to interact with librarians and expert staff
            for collections and collaborate of data.We hope you will use the library as a place of learning, information
            and communication. You can make use of our electronic resources, library facilities like Reference &
            Research Support Services, Circulation Services, Document Delivery Services (DDS), Interlibrary Loan, Press
            Clippings and Table of Contents Services (TOC). We also offer online literature searching techniques,
            citations management tools (Endnote Zotero and Mendeley), how to avoid plagiarism, research topic selection,
            research proposal, literature review step by step, data analysis tool and plagiarism check & publication
            support.
          </p>
          <div class="main-content__scenery">
            <img src="{{ asset('user/assets/images/lib-1.jpg') }}" alt="">
          </div>
          <div class="main-content__scenery">
            <img src="{{ asset('user/assets/images/lib-2.jpg') }}" alt="">
          </div>
          <p class="main-content__short-description text">
            I hope the Library’s rich collections, inspiring spaces and innovative services will help you to achieve
            your academic goals and enrich your experience at MUL. We look forward to serving you in person or virtually
            and we welcome your questions, comments, and suggestions.
          </p>
          <div class="main-content__footer">
            <h2 class="main-content__footer-title">LIBRARY OPENING HOURS</h2>
            <ul class="main-content__footer-items">
              <li class="main-content__footer-item text">Library remains open 5 days a week.</li>
              <li class="main-content__footer-item text">The regular timings are
              </li>
              <li class="main-content__footer-item text">Monday – Friday</li>
              <li class="main-content__footer-item text">8:30 am to 4:30 pm

              </li>
            </ul>
          </div>
        </section>
      </div>
    </section>
  </main>
</x-user.layouts.master>
