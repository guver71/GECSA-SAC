{{-- resources/views/partials/nav.blade.php --}}
<header id="header" class="header g-nav">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="{{ url('/') }}" class="g-nav__logo">
      <img src="{{ asset('assets/img/gecsa.png') }}" alt="GECSA INGENIEROS" loading="eager">
    </a>

    <div class="d-flex align-items-center gap-1">
      <nav id="navmenu" class="navmenu g-nav__menu">
        <ul>
          <li><a href="#hero" class="active">Nosotros</a></li>
          <li><a href="#about">Obras</a></li>
          <li><a href="#services">Expedientes</a></li>
          <li><a href="#perfiles">Perfiles Técnicos</a></li>
          <li><a href="#certificaciones">Certificaciones</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a href="{{ route('login') }}" class="g-nav__admin" title="Acceso administrativo">
        <i class="bi bi-shield-lock"></i>
      </a>
    </div>

  </div>
</header>
