<header id="header" class="header fixed-top shadow-sm">
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <!-- Logo kiri -->
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <h1 class="sitename mb-0">ESG. NOSSEF</h1>
            </a>

            <!-- Menu utama di tengah -->
            <nav id="navmenu" class="navmenu d-none d-xl-flex flex-grow-1 justify-content-center">
                <ul class="d-flex list-unstyled mb-0">
                    <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Baranda</a></li>
                    <li><a href="{{ route('about') }}" class="{{ Route::is('about') ? 'active' : '' }}">Konaba Ami</a></li>
                    <li><a href="{{ route('schedule') }}">Horariu</a></li>
                    <li><a href="{{ route('teachers.index') }}">Lista Professores</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>

            <!-- Login di kanan -->
            <a href="/admin/login" class="btn text-white" style="background-color: #0099ff; border-color: #0099ff;">
              Login
            </a>


            <!-- Mobile toggle -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

        </div>
    </div>
</header>
