<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="./index.html" class="brand-link">
      <!--begin::Brand Image-->
      <img src="./assets/img/AdminLTELogo.png" alt="Logo" class="brand-image opacity-75 shadow" />
      <!--end::Brand Image-->
      <!--begin::Brand Text-->
      <span class="brand-text fw-light">CMS</span>
      <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
  </div>
  <!--end::Sidebar Brand-->
  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation"
        data-accordion="false" id="navigation">

        <li class="nav-item">
          <a href="{{ route('admin.profile') }}" class="nav-link">
            <i class="fa-solid fa-home"></i>
            <p>Home</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.departments') }}" class="nav-link">
            <i class="fa-solid fa-newspaper"></i>
            <p>Depratments</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-box-seam-fill"></i>
            <p>
              Widgets
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./widgets/small-box.html" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Small Box</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./widgets/info-box.html" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>info Box</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./widgets/cards.html" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Cards</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-box-arrow-in-right"></i>
            <p>
              Auth
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                <p>
                  Version 1
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./examples/login.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Login</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./examples/register.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Register</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                <p>
                  Version 2
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./examples/login-v2.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Login</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./examples/register-v2.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Register</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="./examples/lockscreen.html" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Lockscreen</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
