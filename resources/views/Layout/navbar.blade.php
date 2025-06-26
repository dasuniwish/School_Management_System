<nav class="navbar" style="background-color: #001a33;">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#"><i class="bi bi-building"></i>&nbsp;School Management System</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel" style="background-color: #001a33; color: white;">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><i class="bi bi-building"></i>&nbsp;School Management System</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i>&nbsp;Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('teachers.index') }}"><i class="bi bi-person"></i>&nbsp;Teachers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('subjects.index') }}"><i class="bi bi-book-half"></i>&nbsp;Subjects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('classes.index') }}"><i class="bi bi-people-fill"></i>&nbsp;Classes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('students.index') }}"><i class="bi bi-mortarboard-fill"></i>&nbsp;Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('roles.index') }}"><i class="bi bi-mortarboard-fill"></i>&nbsp;Role</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
