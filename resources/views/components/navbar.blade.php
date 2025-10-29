<header id="header" class="header fixed-top shadow-sm">
    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <h1 class="sitename">ESG. NOSSEF</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{route('home')}}" class="{{ Route::is('home') ? 'active' : '' }}">Baranda</a></li>
            <li><a href="{{route('about')}}" class="{{ Route::is('about') ? 'active' : '' }}">Konaba Ami</a></li>
            <li><a href="{{route('schedule')}}">Horariu</a></li>
            <li><a href="{{route('teachers.index')}}">Lista Professores</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#contact">Contact</a></li>
          <li><a href="/admin/login">Login</a></li>

          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </div>
</header>
