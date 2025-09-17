{{-- resources/views/partials/nav.blade.php --}}
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
  <img 
    src="{{ asset('assets/img/gecsa.png') }}" 
    alt="Gecsa Logo" 
    class="img-fluid" 
    style="max-height: 55px;"
  >
</a>


    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Nosotros</a></li>
        <li><a href="#about">Obras</a></li>
        <li><a href="#services">Expedientes</a></li>
        <li><a href="#team">Perfiles Tecnicos</a></li>
        <li><a href="#contact">Certificaciones</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>
