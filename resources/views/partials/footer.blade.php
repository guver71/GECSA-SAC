{{-- resources/views/partials/footer.blade.php --}}
<footer id="footer" class="g-footer">
  <div class="container">
    <div class="g-footer__grid">

      {{-- Marca --}}
      <div class="g-footer__brand">
        <img src="{{ asset('assets/img/gecsa.png') }}" alt="GECSA Logo" class="g-footer__logo">
        <p class="g-footer__desc">
          Empresa peruana especializada en ejecución, supervisión y consultoría de obras civiles, ambientales y mineras a nivel nacional.
        </p>
        <div class="g-footer__social">
          <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
          <a href="#" aria-label="X/Twitter"><i class="bi bi-twitter-x"></i></a>
        </div>
      </div>

      {{-- Navegación --}}
      <div class="g-footer__nav">
        <p class="g-footer__nav-title">Navegación</p>
        <ul>
          <li><a href="#hero">Nosotros</a></li>
          <li><a href="#about">Obras</a></li>
          <li><a href="#services">Expedientes</a></li>
          <li><a href="#perfiles">Perfiles Técnicos</a></li>
          <li><a href="#certificaciones">Certificaciones</a></li>
        </ul>
      </div>

      {{-- Contacto --}}
      <div class="g-footer__contact">
        <p class="g-footer__nav-title">Información legal</p>
        <ul>
          <li><i class="bi bi-building"></i> GECSA INGENIEROS S.A.C.</li>
          <li><i class="bi bi-hash"></i> RUC: 20604533051</li>
          <li><i class="bi bi-calendar3"></i> Constituida: 19 de mayo de 2021</li>
          <li><i class="bi bi-geo-alt"></i> Perú</li>
        </ul>
      </div>

    </div>

    <div class="g-footer__bottom">
      <span>&copy; {{ date('Y') }} GECSA INGENIEROS S.A.C. Todos los derechos reservados.</span>
    </div>
  </div>
</footer>
