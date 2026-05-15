@extends('layouts.avilon')

@section('title', 'Inicio | GECSA INGENIEROS S.A.C.')
@section('body-class', 'index-page')

@section('content')
<main class="main">

  {{-- ═══════════════════════════════════════════
       HERO — Split layout con isla flotante
  ═══════════════════════════════════════════ --}}
  <section id="hero" class="g-hero">

    {{-- Líneas decorativas de fondo --}}
    <div class="g-hero__lines" aria-hidden="true">
      <div class="g-line g-line--1"></div>
      <div class="g-line g-line--2"></div>
      <div class="g-line g-line--3"></div>
    </div>

    <div class="container g-hero__inner">
      <div class="row align-items-center g-hero__row">

        {{-- Texto --}}
        <div class="col-lg-6 g-hero__text">
          <div class="g-hero__tag animate__animated animate__fadeInDown">
            <span></span>Empresa peruana de ingeniería
          </div>
          <h1 class="g-hero__title animate__animated animate__fadeInUp">
            Construimos<br>infraestructura<br><span>que transforma</span><br><span>vidas.</span>
          </h1>
          <p class="g-hero__sub animate__animated animate__fadeInUp animate__delay-1s">
            Ejecución, supervisión y consultoría de obras civiles,
            ambientales y mineras en todo el territorio nacional.
          </p>
          <div class="g-hero__actions animate__animated animate__fadeInUp animate__delay-1s">
            <a href="#about" class="g-btn g-btn--solid scrollto">Ver proyectos</a>
            <a href="#certificaciones" class="g-btn g-btn--ghost scrollto">
              <i class="bi bi-award"></i> Certificaciones
            </a>
          </div>
        </div>

        {{-- Isla flotante --}}
        <div class="col-lg-6 g-hero__island-col animate__animated animate__fadeInRight animate__delay-1s">
          @php $heroObras = $obras->take(3); @endphp
          @if($heroObras->isNotEmpty())
          <div class="g-island" id="heroIsland" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="g-island__inner carousel carousel-fade">
              <div class="carousel-inner">
                @foreach($heroObras as $hi => $ho)
                <div class="carousel-item {{ $hi === 0 ? 'active' : '' }}">
                  <img src="{{ asset('assets/img/' . $ho->img) }}"
                       alt="{{ $ho->title }}"
                       class="g-island__img"
                       loading="{{ $hi === 0 ? 'eager' : 'lazy' }}">
                </div>
                @endforeach
              </div>
            </div>

            {{-- Badge flotante --}}
            <div class="g-island__badge">
              <i class="bi bi-patch-check-fill"></i>
              <div>
                <strong>Obras certificadas</strong>
                <span>ISO 9001 · 14001 · 45001</span>
              </div>
            </div>

            {{-- Dots --}}
            <div class="g-island__dots">
              @foreach($heroObras as $hi => $ho)
                <button class="g-island__dot {{ $hi === 0 ? 'active' : '' }}"
                        data-bs-target="#heroIsland" data-bs-slide-to="{{ $hi }}"
                        aria-label="Obra {{ $hi+1 }}"></button>
              @endforeach
            </div>
          </div>
          @endif
        </div>

      </div>
    </div>

    {{-- Olas animadas --}}
    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none" aria-hidden="true">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
      </defs>
      <g class="wave1"><use href="#wave-path" x="50" y="3"/></g>
      <g class="wave2"><use href="#wave-path" x="50" y="0"/></g>
      <g class="wave3"><use href="#wave-path" x="50" y="9"/></g>
    </svg>
  </section>

  {{-- ═══════════════════════════════════════════
       STATS BAR
  ═══════════════════════════════════════════ --}}
  <section class="g-stats">
    <div class="container">
      <div class="g-stats__grid">
        <div class="g-stats__item" data-aos="fade-up" data-aos-delay="0">
          <span class="g-stats__num">{{ $obras->count() }}</span>
          <span class="g-stats__label">Obras ejecutadas<br>y supervisadas</span>
        </div>
        <div class="g-stats__item" data-aos="fade-up" data-aos-delay="100">
          <span class="g-stats__num">{{ $expedientes->count() }}</span>
          <span class="g-stats__label">Expedientes<br>técnicos</span>
        </div>
        <div class="g-stats__item" data-aos="fade-up" data-aos-delay="200">
          <span class="g-stats__num">{{ $perfiles->count() }}</span>
          <span class="g-stats__label">Perfiles técnicos<br>formulados</span>
        </div>
        <div class="g-stats__item" data-aos="fade-up" data-aos-delay="300">
          <span class="g-stats__num">2021</span>
          <span class="g-stats__label">Año de<br>fundación</span>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══════════════════════════════════════════
       OBRAS
  ═══════════════════════════════════════════ --}}
  <section id="about" class="g-section g-section--white">
    <div class="container">
      <div class="g-section__head" data-aos="fade-up">
        <p class="g-section__eyebrow">Portafolio</p>
        <h2 class="g-section__title">Obras ejecutadas<br>y supervisadas</h2>
      </div>

      @if($obras->isNotEmpty())
      <div id="obrasCarousel" class="carousel slide g-carousel" data-bs-ride="carousel" data-bs-interval="5500">
        <div class="carousel-inner">
          @foreach($obras as $i => $obra)
          <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
            <div class="g-obra">
              <div class="g-obra__img" data-aos="fade-right" data-aos-duration="700">
                <img src="{{ asset('assets/img/' . $obra->img) }}"
                     alt="{{ $obra->title }}"
                     loading="{{ $i === 0 ? 'eager' : 'lazy' }}">
                <span class="g-obra__tipo g-obra__tipo--{{ $obra->tipo }}">
                  {{ $obra->tipo === 'supervision' ? 'Supervisión' : 'Ejecución' }}
                </span>
                <div class="g-obra__counter">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }} / {{ str_pad($obras->count(), 2, '0', STR_PAD_LEFT) }}</div>
              </div>
              <div class="g-obra__info" data-aos="fade-left" data-aos-duration="700">
                <h3 class="g-obra__title">{{ $obra->title }}</h3>
                <dl class="g-obra__dl">
                  <div>
                    <dt><i class="bi bi-geo-alt"></i> Ubicación</dt>
                    <dd>{{ $obra->ubicacion }}</dd>
                  </div>
                  <div>
                    <dt><i class="bi bi-building"></i> Cliente</dt>
                    <dd>{{ $obra->cliente }}</dd>
                  </div>
                  <div>
                    <dt><i class="bi bi-cash-coin"></i> Monto</dt>
                    <dd class="fw-semibold">{{ $obra->monto }}</dd>
                  </div>
                  <div>
                    <dt><i class="bi bi-calendar3"></i> Plazo</dt>
                    <dd>{{ $obra->plazo }}</dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="g-carousel__controls">
          <button class="g-carousel__btn" data-bs-target="#obrasCarousel" data-bs-slide="prev" aria-label="Anterior">
            <i class="bi bi-arrow-left"></i>
          </button>
          <div class="g-carousel__dots">
            @foreach($obras as $i => $obra)
              <button class="g-carousel__dot {{ $i === 0 ? 'active' : '' }}"
                      data-bs-target="#obrasCarousel" data-bs-slide-to="{{ $i }}"
                      aria-label="Obra {{ $i+1 }}"></button>
            @endforeach
          </div>
          <button class="g-carousel__btn" data-bs-target="#obrasCarousel" data-bs-slide="next" aria-label="Siguiente">
            <i class="bi bi-arrow-right"></i>
          </button>
        </div>
      </div>
      @else
        <p class="text-center text-muted py-5">No hay obras registradas.</p>
      @endif
    </div>
  </section>

  {{-- ═══════════════════════════════════════════
       CLIENTES
  ═══════════════════════════════════════════ --}}
  <section id="clients" class="g-clients">
    <div class="container">
      <p class="g-clients__label" data-aos="fade-up">Entidades con las que hemos trabajado</p>
      <div class="g-clients__logos" data-aos="fade-up" data-aos-delay="100">
        @foreach(range(1,6) as $i)
          <img src="{{ asset("assets/img/clients/client-{$i}.png") }}" alt="Cliente {{ $i }}" loading="lazy">
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══════════════════════════════════════════
       EXPEDIENTES TÉCNICOS — Swiper 2 por vista
  ═══════════════════════════════════════════ --}}
  <section id="services" class="g-section g-exp-section">
    <div class="container">

      <div class="g-exp-header" data-aos="fade-up">
        <div>
          <p class="g-section__eyebrow">Documentación técnica</p>
          <h2 class="g-section__title">Expedientes técnicos</h2>
          <p class="g-section__desc">Proyectos formulados con documentación especializada a nivel nacional</p>
        </div>
        <div class="g-exp-header__count">
          <span class="g-exp-header__num">{{ $expedientes->count() }}</span>
          <span class="g-exp-header__lbl">proyectos<br>registrados</span>
        </div>
      </div>

      @if($expedientes->isNotEmpty())
      <div class="g-swiper-wrap" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper swiperExp">
          <div class="swiper-wrapper">
            @foreach($expedientes as $idx => $exp)
            <div class="swiper-slide">
              <div class="g-exp-item">
                <div class="g-exp-item__num">{{ str_pad($idx+1, 2, '0', STR_PAD_LEFT) }}</div>
                <div class="g-exp-item__body">
                  <p class="g-exp-item__title">{{ $exp->title }}</p>
                  <div class="g-exp-item__tags">
                    <span class="g-tag g-tag--snip"><i class="bi bi-hash"></i>SNIP {{ $exp->snip }}</span>
                    <span class="g-tag g-tag--monto"><i class="bi bi-cash-coin"></i>{{ $exp->monto }}</span>
                    <span class="g-tag g-tag--fecha"><i class="bi bi-calendar3"></i>{{ $exp->fecha_contrato }}</span>
                  </div>
                </div>
                <div class="g-exp-item__arrow"><i class="bi bi-arrow-up-right"></i></div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        {{-- Controles personalizados --}}
        <div class="g-swiper-nav">
          <button class="g-swiper-btn exp-prev"><i class="bi bi-arrow-left"></i></button>
          <div class="g-swiper-pagination exp-pagination"></div>
          <button class="g-swiper-btn exp-next"><i class="bi bi-arrow-right"></i></button>
        </div>
      </div>
      @else
        <p class="text-center py-4" style="color:rgba(255,255,255,.4)">No hay expedientes registrados.</p>
      @endif

    </div>
  </section>

  {{-- ═══════════════════════════════════════════
       PERFILES TÉCNICOS — Swiper 3 por vista
  ═══════════════════════════════════════════ --}}
  <section id="perfiles" class="g-section g-section--white">
    <div class="container">
      <div class="g-section__head" data-aos="fade-up">
        <p class="g-section__eyebrow">Preinversión</p>
        <h2 class="g-section__title">Formulación de<br>perfiles técnicos</h2>
        <p class="g-section__desc">Proyectos en etapa de diseño técnico y preinversión</p>
      </div>

      @if($perfiles->isNotEmpty())
      <div class="g-swiper-wrap" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper swiperPerfiles">
          <div class="swiper-wrapper">
            @foreach($perfiles as $idx => $perfil)
            <div class="swiper-slide" style="height:auto;">
              <div class="g-perfil-card">
                <div class="g-perfil-card__head">
                  <div class="g-perfil-card__icon-wrap">
                    <i class="bi bi-{{ $perfil->icon }}"></i>
                  </div>
                  <span class="g-perfil-card__badge">{{ str_pad($idx+1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="g-perfil-card__body">
                  <p class="g-perfil-card__title">{{ $perfil->proyecto }}</p>
                  <div class="g-perfil-card__footer">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>{{ $perfil->ubicacion }}</span>
                  </div>
                </div>
                <div class="g-perfil-card__line"></div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="g-swiper-nav">
          <button class="g-swiper-btn prf-prev"><i class="bi bi-arrow-left"></i></button>
          <div class="g-swiper-pagination prf-pagination"></div>
          <button class="g-swiper-btn prf-next"><i class="bi bi-arrow-right"></i></button>
        </div>
      </div>
      @else
        <p class="text-center text-muted py-4">No hay perfiles técnicos registrados.</p>
      @endif
    </div>
  </section>

  {{-- ═══════════════════════════════════════════
       CERTIFICACIONES ISO
  ═══════════════════════════════════════════ --}}
  <section id="certificaciones" class="g-section g-section--dark">
    <div class="container">
      <div class="g-section__head g-section__head--light" data-aos="fade-up">
        <p class="g-section__eyebrow">Estándares</p>
        <h2 class="g-section__title">Certificaciones ISO</h2>
        <p class="g-section__desc">Implementamos estándares internacionales de calidad, seguridad y sostenibilidad.</p>
      </div>

      <div class="g-iso-grid" data-aos="fade-up" data-aos-delay="100">
        @foreach([
          ['iso9001',  'ISO 9001',  'Gestión de Calidad'],
          ['iso14001', 'ISO 14001', 'Gestión Ambiental'],
          ['iso45001', 'ISO 45001', 'Seguridad y Salud'],
          ['iso50001', 'ISO 50001', 'Gestión Energética'],
          ['iso37001', 'ISO 37001', 'Gestión Antisoborno'],
        ] as [$img, $nombre, $desc])
        <div class="g-iso-item">
          <img src="{{ asset("assets/img/{$img}.png") }}" alt="{{ $nombre }}" loading="lazy">
          <span class="g-iso-item__name">{{ $nombre }}</span>
          <span class="g-iso-item__desc">{{ $desc }}</span>
        </div>
        @endforeach
      </div>
    </div>
  </section>

</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

  // ── Swiper Expedientes (2 por vista) ──
  new Swiper('.swiperExp', {
    slidesPerView: 1,
    spaceBetween: 12,
    loop: true,
    autoplay: { delay: 4500, disableOnInteraction: false, pauseOnMouseEnter: true },
    pagination: { el: '.exp-pagination', clickable: true, dynamicBullets: true },
    navigation: { prevEl: '.exp-prev', nextEl: '.exp-next' },
    breakpoints: {
      768:  { slidesPerView: 1, spaceBetween: 12 },
      1024: { slidesPerView: 2, spaceBetween: 16 },
    }
  });

  // ── Swiper Perfiles (3 por vista) ──
  new Swiper('.swiperPerfiles', {
    slidesPerView: 1,
    spaceBetween: 16,
    loop: true,
    autoplay: { delay: 4000, disableOnInteraction: false, pauseOnMouseEnter: true },
    pagination: { el: '.prf-pagination', clickable: true, dynamicBullets: true },
    navigation: { prevEl: '.prf-prev', nextEl: '.prf-next' },
    breakpoints: {
      640:  { slidesPerView: 2, spaceBetween: 16 },
      1024: { slidesPerView: 3, spaceBetween: 20 },
    }
  });

});
</script>
@endpush
