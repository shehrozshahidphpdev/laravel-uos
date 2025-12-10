@props(['settings'])
<!-- main navbar header -->
<header class="navbar">
  <div class="container">
    <!-- main logo -->
    <div class="logo">
      <a href="/">
        <img src="{{ asset('storage/admin/uploads/' . $settings->logo) }}" alt="logo">
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
              <li class="dropdown__item"><a href="{{ route('user.introduction') }}"
                  class="dropdown__item-link">Introduction</a></li>
              <li class="dropdown__item"><a href="{{ route('user.chancellor-message') }}"
                  class="dropdown__item-link">Chancellor
                  Message</a></li>
              <li class="dropdown__item"><a href="{{ route('user.vc-message') }}" class="dropdown__item-link">Vice
                  Chancellor Message</a></li>
              <li class="dropdown__item"><a href="{{ route('user.uni-map') }}" class="dropdown__item-link">Uni
                  Map</a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.news-letter') }}"
                  class="dropdown__item-link">NewsLetter</a></li>
              <li class="dropdown__item"><a href="{{ route('user.events') }}" class="dropdown__item-link">Events</a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.news') }}" class="dropdown__item-link">News</a>
              </li>
            </ul>
          </div>
        </li>
        <!-- Administration pages -->
        <li class="navigation__item"><a href="">Administration
          </a>
          <div class="dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="{{route('user.vice-chancellor')}}" class="dropdown__item-link">Vice
                  Chancellor office</a></li>
              <li class="dropdown__item"><a href="{{route('user.registrar')}}" class="dropdown__item-link">Registrar
                  Office</a></li>
              <li class="dropdown__item"><a href="{{route('user.treasure')}}" class="dropdown__item-link">Treasure
                  Office</a></li>
              <li class="dropdown__item"><a href="{{route('user.controller-examination')}}"
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
                    <li class="dropdown__item"><a
                        href="{{ route('user.department.departmentPage', 'computer-science') }}"
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
                    <li class="dropdown__item"><a
                        href="{{ route('user.department.departmentPage', 'business-administration') }}"
                        class="dropdown__item-link">Busines
                        Administration</a></li>
                    <li class="dropdown__item"><a href="{{ route('user.department.departmentPage', 'commerce') }}"
                        class="dropdown__item-link">Commerce
                      </a></li>
                    <li class="dropdown__item"><a href="{{ route('user.department.departmentPage', 'economics') }}"
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
                    <li class="dropdown__item"><a href="{{ route('user.department.departmentPage', 'english') }}"
                        class="dropdown__item-link">English</a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Faculty of Law pages  -->
              <li class="dropdown__item"><a href="" class="dropdown__item-link">Faculty of Law</a>
                <!-- side items  -->
                <div class="dropdown__side">
                  <ul class="dropdown__submenu dropdown-items">
                    <li class="dropdown__item"><a href="{{ route('user.department.departmentPage', 'law') }}"
                        class="dropdown__item-link">Law</a></li>
                  </ul>
                </div>
              </li>
              <!-- Faculty of sciences page  -->
              <li class="dropdown__item"><a href="" class="dropdown__item-link">Faculty of
                  sciences</a>
                <!-- side items  -->
                <div class="dropdown__side">
                  <ul class="dropdown__submenu dropdown-items">
                    <li class="dropdown__item"><a href="{{ route('user.department.departmentPage', 'chemistry') }}"
                        class="dropdown__item-link">Chemistry</a></li>
                    <li class="dropdown__item"><a href="{{ route('user.department.departmentPage', 'mathematics') }}"
                        class="dropdown__item-link">Mathematics</a></li>
                    <li class="dropdown__item"><a href="{{ route('user.department.departmentPage', 'physics') }}"
                        class="dropdown__item-link">Physics
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
                    <li class="dropdown__item"><a
                        href="{{ route('user.department.departmentPage', 'applied-physcology') }}"
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
              <li class="dropdown__item"><a href="{{ route('user.director.academics') }}"
                  class="dropdown__item-link">Academics</a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.director.estate-management') }}"
                  class="dropdown__item-link">Estate Management</a></li>
              <li class="dropdown__item"><a href="{{ route('user.graduate-studies') }}"
                  class="dropdown__item-link">Graduate Studies</a></li>
              <li class="dropdown__item"><a href="{{ route('user.information-technology') }}"
                  class="dropdown__item-link">Information Technology</a></li>
              <li class="dropdown__item"><a href="{{ route('user.director.oric') }}"
                  class="dropdown__item-link">ORIC</a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.planning-development') }}"
                  class=" dropdown__item-link">Planning And Development</a></li>
              <li class="dropdown__item"><a href="{{ route('user.project-director') }}"
                  class="dropdown__item-link">Project Director </a></li>
              <li class="dropdown__item"><a href="{{ route('user.qec') }}" class="dropdown__item-link">Quality
                  Enhancemebt Call </a></li>
              <li class="dropdown__item"><a href="{{ route('user.resident-officer') }}"
                  class="dropdown__item-link">Resident Officer </a></li>
              <li class="dropdown__item"><a href="{{ route('user.student-affair') }}"
                  class="dropdown__item-link">Student
                  Affairs </a></li>
              <li class="dropdown__item"><a href="{{ route('user.sports') }}" class="dropdown__item-link">Sports
                </a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.sustainability') }}"
                  class="dropdown__item-link">sustainability </a></li>
            </ul>
          </div>
        </li>
        <!-- ADMISSIONS PAGES  -->
        <li class="navigation__item"><a href="">Admissions</a>
          <div class="dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="{{ route('user.prospectus') }}"
                  class="dropdown__item-link">Prospectus</a>
              </li>
              <li class="dropdown__item"><a href="#" class="dropdown__item-link">Online Admission
                  Portal</a></li>
              <li class="dropdown__item"><a href="{{ route('user.apply') }}" class="dropdown__item-link">How To
                  Apply</a></li>
            </ul>
          </div>
        </li>
        <!-- STUDENT PAGES  -->
        <li class="navigation__item"><a href="">Students</a>
          <div class="dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="{{ route('user.time-table') }}" class="dropdown__item-link">Time
                  Table</a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.library') }}" class="dropdown__item-link">Library</a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.scholarships') }}" class="dropdown__item-link">
                  Scholarships </a></li>
              <li class="dropdown__item"><a href="{{ route('user.transport') }}"
                  class="dropdown__item-link">Transportation</a></li>
              <li class="dropdown__item"><a href="{{ route('user.hostel') }}" class="dropdown__item-link">Hostel</a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.sports') }}" class="dropdown__item-link">Sports</a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.plan9') }}" class="dropdown__item-link">Regional
                  Plan 9</a></li>
              <li class="dropdown__item"><a href="{{ route('user.courseera') }}" class="dropdown__item-link">HEC's
                  and Courseera</a></li>
            </ul>
          </div>
        </li>
        <!-- DOWNLOADS PAGEES  -->
        <li class="navigation__item"><a href="">Downloads</a>
          <div class="dropdown downloads-dropdown">
            <ul class="dropdown__items">
              <li class="dropdown__item"><a href="{{ route('user.dsa-downloads') }}"
                  class="dropdown__item-link">Download
                  Forms</a>
              </li>
              <li class="dropdown__item"><a href="{{ route('user.notifications') }}"
                  class="dropdown__item-link">Notifications</a></li>
            </ul>
          </div>
        </li>
        <li class="navigation__item"><a href="{{ route('user.merit-list') }}">Merit Lists</a>
        </li>
        <li class="navigation__item"><a href="{{ route('user.contact') }}">Contact Us</a>
        </li>
        {{-- signle news --}}
        {{-- <li class="navigation__item"><a href="{{ route('user.single-news') }}">Single News</a>
        </li> --}}
      </ul>
    </nav>
  </div>
</header>
