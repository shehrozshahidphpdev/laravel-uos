<!-- main navbar header -->
<header class="navbar">
  <div class="container">
    <!-- main logo -->
    <div class="logo">
      <a href="/">
        <img src="{{ asset('user/assets/images/logo.png') }}" alt="logo">
      </a>
    </div>
    <!-- hamburger icon -->
    <div class="hamburger">
      <div class="ham-menu" onclick="toggleHamburger(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
    </div>

    <!-- mobile navbar main menu starts -->
    <div class="hamburger__dropdown">
      <nav class="hamburger__nav">
        <ul class="hamburger__menu">
          <li>
            <a href="#">ABOUT</a>
            <span class="open">+</span>
            <ul class="submenu">
              <li><a href="#">Introduction</a></li>
              <li><a href="#">Chancellor Message</a></li>
              <li><a href="#">Vice Chancellor Message</a></li>
              <li><a href="#">University Map</a></li>
              <li><a href="#">Events</a></li>
            </ul>
          </li>
          <li>
            <a href="#">ADMINISTRATION</a>
            <span class="open">+</span>
            <ul class="submenu">
              <li><a href="#">VC Office</a></li>
              <li><a href="#">Registrar</a></li>
              <li><a href="#">Controller Exams</a></li>
            </ul>
          </li>
          <!-- repeat for other menus -->
        </ul>
      </nav>
    </div>
    <!-- mobile navbar main menu ends -->

    <!-- desktop navbar -->
    <nav class="navigation">
      <ul class="navigation__items">
        <!-- ABOUT PAGES -->
        <li class="navigation__item about"><a href="">About</a>
          <div class="dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="about\about-introduction.html"
                  class="dropdown__item-link">Introduction</a></li>
              <li class="dropdown__item"><a href="about\about-chancellor-message.html"
                  class="dropdown__item-link">Chncellor
                  Message</a></li>
              <li class="dropdown__item"><a href="about\about-vice-chancellor-message.html"
                  class="dropdown__item-link">Vice
                  Chancellor Message</a></li>
              <li class="dropdown__item"><a href="about\about-uni-map.html" class="dropdown__item-link">Uni
                  Map</a>
              </li>
              <li class="dropdown__item"><a href="about\about-newsletter.html"
                  class="dropdown__item-link">NewsLetter</a></li>
              <li class="dropdown__item"><a href="about\about-events.html" class="dropdown__item-link">Events</a></li>
              <li class="dropdown__item"><a href="about\about-news.html" class="dropdown__item-link">News</a>
              </li>
            </ul>
          </div>
        </li>
        <!-- Administration pages -->
        <li class="navigation__item"><a href="">Administration
          </a>
          <div class="dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="administration\vc-office.html" class="dropdown__item-link">Vice
                  Chancellor office</a></li>
              <li class="dropdown__item"><a href="administration\registrar.html" class="dropdown__item-link">Registrar
                  Office</a></li>
              <li class="dropdown__item"><a href="administration\treasure-office.html"
                  class="dropdown__item-link">Treasure Office</a></li>
              <li class="dropdown__item"><a href="administration\controller-examinations.html"
                  class="dropdown__item-link">Controller Examination</a></li>
            </ul>
          </div>
        </li>
        <!-- FACULTIES PAGES -->
        <li class="navigation__item"><a href="">Faculties
          </a>
          <div class="dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="" class="dropdown__item-link">Faculty Of infromation
                  and computing
                  technology</a>
                <!-- side items  -->
                <div class="dropdown__side">
                  <ul class="dropdown__submenu dropdown-items">
                    <li class="dropdown__item"><a href="faculties\computer-science.html"
                        class="dropdown__item-link">computer Science</a></li>
                  </ul>
                </div>
              </li>

              <li class="dropdown__item"><a href="" class="dropdown__item-link">Faculty of Economics
                  and Management
                  Sciences</a>
                <!-- side items  -->
                <div class="dropdown__side">
                  <ul class="dropdown__submenu dropdown-items">
                    <li class="dropdown__item"><a href="faculties\BA.html" class="dropdown__item-link">Busines
                        Administration</a></li>
                    <li class="dropdown__item"><a href="faculties\commerce.html" class="dropdown__item-link">Commerce
                      </a></li>
                    <li class="dropdown__item"><a href="faculties\economics.html"
                        class="dropdown__item-link">Economics</a></li>
                  </ul>
                </div>
              </li>
              <!-- Faculty of languages and literature pages -->

              <li class="dropdown__item"><a href="" class="dropdown__item-link">Faculty of languages
                  and
                  literature</a>
                <!-- side items  -->
                <div class="dropdown__side">
                  <ul class="dropdown__submenu dropdown-items">
                    <li class="dropdown__item"><a href="faculties\english.html" class="dropdown__item-link">English</a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Faculty of Law pages  -->
              <li class="dropdown__item"><a href="" class="dropdown__item-link">Faculty of Law</a>
                <!-- side items  -->
                <div class="dropdown__side">
                  <ul class="dropdown__submenu dropdown-items">
                    <li class="dropdown__item"><a href="faculties\law.html" class="dropdown__item-link">Law</a></li>
                  </ul>
                </div>
              </li>
              <!-- Faculty of sciences page  -->
              <li class="dropdown__item"><a href="" class="dropdown__item-link">Faculty of
                  sciences</a>
                <!-- side items  -->
                <div class="dropdown__side">
                  <ul class="dropdown__submenu dropdown-items">
                    <li class="dropdown__item"><a href="faculties\chemistry.html"
                        class="dropdown__item-link">Chemistry</a></li>
                    <li class="dropdown__item"><a href="faculties\maths.html"
                        class="dropdown__item-link">Mathematics</a></li>
                    <li class="dropdown__item"><a href="faculties\physics.html" class="dropdown__item-link">Physics
                      </a></li>
                  </ul>
                </div>
              </li>
              <!-- Faculty of Social Sciences pages  -->
              <li class="dropdown__item"><a href="" class="dropdown__item-link">Faculty of Social
                  Sciences</a>
                <!-- side items  -->
                <div class="dropdown__side">
                  <ul class="dropdown__submenu dropdown-items">
                    <li class="dropdown__item"><a href="faculties\applied-physcology.html"
                        class="dropdown__item-link">Applied Physcology</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <!-- DIRECTORATES PAGES  -->
        <li class="navigation__item"><a href="">Directories</a>
          <div class="dropdown ">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="directorates\academics.html" class="dropdown__item-link">Academics</a>
              </li>
              <li class="dropdown__item"><a href="directorates\estate-management.html"
                  class="dropdown__item-link">Estate Management</a></li>
              <li class="dropdown__item"><a href="directorates\graduate-studies.html"
                  class="dropdown__item-link">Graduate Studies</a></li>
              <li class="dropdown__item"><a href="directorates\information-technology.html"
                  class="dropdown__item-link">Information Technology</a></li>
              <li class="dropdown__item"><a href="directorates\oric.html" class="dropdown__item-link">ORIC</a>
              </li>
              <li class="dropdown__item"><a href="directorates\planning-development.html"
                  class="dropdown__item-link">Planning And Development</a></li>
              <li class="dropdown__item"><a href="directorates\project-director.html"
                  class="dropdown__item-link">Project Director </a></li>
              <li class="dropdown__item"><a href="directorates\quality-enhancement-call.html"
                  class="dropdown__item-link">Quality Enhancemebt Call </a></li>
              <li class="dropdown__item"><a href="directorates\resident-officer.html"
                  class="dropdown__item-link">Resident Officer </a></li>
              <li class="dropdown__item"><a href="directorates\student-affairs.html" class="dropdown__item-link">Student
                  Affairs </a></li>
              <li class="dropdown__item"><a href="directorates\sports.html" class="dropdown__item-link">Sports
                </a>
              </li>
              <li class="dropdown__item"><a href="directorates\sustainability.html"
                  class="dropdown__item-link">sustainability </a></li>
            </ul>
          </div>
        </li>
        <!-- ADMISSIONS PAGES  -->
        <li class="navigation__item"><a href="">Admissions</a>
          <div class="dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="admissions\prospectus.html" class="dropdown__item-link">Prospectus</a>
              </li>
              <li class="dropdown__item"><a href="#" class="dropdown__item-link">Online Admission
                  Portal</a></li>
              <li class="dropdown__item"><a href="admissions\how-to-apply.html" class="dropdown__item-link">How To
                  Apply</a></li>
            </ul>
          </div>
        </li>
        <!-- STUDENT PAGES  -->
        <li class="navigation__item"><a href="">Students</a>
          <div class="dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="students\time-table.html" class="dropdown__item-link">Time
                  Table</a>
              </li>
              <li class="dropdown__item"><a href="students\library.html" class="dropdown__item-link">Library</a></li>
              <li class="dropdown__item"><a href="students\scholarships.html" class="dropdown__item-link">
                  Scholarships </a></li>
              <li class="dropdown__item"><a href="students\transportation.html"
                  class="dropdown__item-link">Transportation</a></li>
              <li class="dropdown__item"><a href="students\hostel.html" class="dropdown__item-link">Hostel</a>
              </li>
              <li class="dropdown__item"><a href="students\sports.html" class="dropdown__item-link">Sports</a>
              </li>
              <li class="dropdown__item"><a href="students\regional-plan.html" class="dropdown__item-link">Regional
                  Plan 9</a></li>
              <li class="dropdown__item"><a href="students\digital-learning.html" class="dropdown__item-link">HEC's
                  and Courseera</a></li>
            </ul>
          </div>
        </li>
        <!-- DOWNLOADS PAGEES  -->
        <li class="navigation__item"><a href="">Downloads</a>
          <div class="dropdown downloads-dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="downloads\forms.html" class="dropdown__item-link">Download
                  Forms</a>
              </li>
              <li class="dropdown__item"><a href="downloads\notifications.html"
                  class="dropdown__item-link">Notifications</a></li>
            </ul>
          </div>
        </li>
        <li class="navigation__item"><a href="merit-list.html">Merit Lists</a>
        </li>
        <li class="navigation__item"><a href="contact-us.html">Contact Us</a>
        </li>
      </ul>
    </nav>
  </div>
</header>
