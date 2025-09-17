{{-- resources/views/welcome.blade.php --}}
@extends('layouts.avilon')

@section('title','Index - Avilon')
@section('body-class','index-page')

@section('content')
<main class="main">

  {{-- Hero Section --}}
  <section id="hero" class="hero section dark-background">
    <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
      @foreach([
        ['title'=>'Bienvenidos a <span>GECSA INGENIEROS</span>','text'=>'“GECSA INGENIEROS S.A.C. fue creada el 19 de mayo de 2021, con el objetivo de participar en la ejecución y consultoría de obras civiles, ambientales y mineras. Contamos con un equipo de profesionales altamente calificado y comprometido con la excelencia.”'],
        ['title'=>'Misión y Visión','text'=>'🧭 Misión "Somos un grupo empresarial constructor dedicado a la ejecución de proyectos de vivienda y obras civiles, orientado a generar bienestar, seguridad y confianza en nuestros clientes..." 🌟 Visión "Posicionar nuestra marca fortaleciendo su imagen corporativa, ser reconocidos por nuestros clientes como un grupo constructor que aporta al desarrollo social..."'],
        ['title'=>'Nuestros Valores Corporativos','text'=>'✅ Respeto y empatía

💪 Constancia ante los retos

🏆 Excelencia profesional

❤️ Pasión por lo que hacemos.']
      ] as $idx => $slide)
        <div class="carousel-item {{ $idx===0?'active':'' }}">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">{!! $slide['title'] !!}</h2>
            <p class="animate__animated animate__fadeInUp">{{ $slide['text'] }}</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Saber Más</a>
          </div>
        </div>
      @endforeach

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
      </defs>
      <g class="wave1"><use xlink:href="#wave-path" x="50" y="3"/></g>
      <g class="wave2"><use xlink:href="#wave-path" x="50" y="0"/></g>
      <g class="wave3"><use xlink:href="#wave-path" x="50" y="9"/></g>
    </svg>
  </section>
  {{-- /Hero Section --}}

  {{-- Obras Section --}}
  <section id="about" class="about section bg-light py-5">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold text-uppercase" data-aos="fade-up">Obras Ejecutadas y Supervisadas</h2>

    <div id="obrasCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        @php
        $obras = [
          ['img'=>'obra1.png','title'=>'Agua Potable y Saneamiento - Challa Challa y Ccyarani','ubicacion'=>'Challhuahuacho, Cotabambas, Apurímac','cliente'=>'Municipalidad Distrital de Challhuahuacho','monto'=>'S/ 2,074,386.16','plazo'=>'18/05/2022 al 30/12/2022'],
          ['img'=>'obra2.jpg','title'=>'Plaza Cívica en Tambillo','ubicacion'=>'Ituata, Carabaya, Puno','cliente'=>'Municipalidad Distrital de Ituata','monto'=>'S/ 417,867.03','plazo'=>'14/09/2021 al 31/12/2021'],
          ['img'=>'obra3.png','title'=>'Plaza en la Comunidad de Pago Carabaya','ubicacion'=>'Ituata, Carabaya, Puno','cliente'=>'Municipalidad Distrital de Ituata','monto'=>'S/ 411,403.34','plazo'=>'14/09/2021 al 31/12/2021'],
          ['img'=>'supervision1.png','title'=>'Supervisión: Transitabilidad A.H. El Provenir','ubicacion'=>'Jaqui, Caravelí, Arequipa','cliente'=>'Municipalidad Distrital de Jaqui','monto'=>'S/ 64,881.90','plazo'=>'15/12/2023 al 13/04/2024'],
          ['img'=>'supervision2.jpg','title'=>'Supervisión: Institución Inicial N° 515 Pulpera','ubicacion'=>'Santo Tomás, Chumbivilcas, Cusco','cliente'=>'Municipalidad Provincial de Chumbivilcas','monto'=>'S/ 198,461.34','plazo'=>'21/12/2022 al 14/09/2023'],
        ];
        @endphp

        @foreach ($obras as $index => $obra)
        <div class="carousel-item @if($index === 0) active @endif">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="overflow-hidden rounded-4 shadow-sm">
                <img src="{{ asset('assets/img/' . $obra['img']) }}" class="d-block w-100 img-fluid" alt="Obra {{ $index + 1 }}" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <div class="col-md-6 px-4">
              <h4 class="fw-bold mb-3">{{ $obra['title'] }}</h4>
              <ul class="list-unstyled small">
                <li><strong>📍 Ubicación:</strong> {{ $obra['ubicacion'] }}</li>
                <li><strong>🏛 Cliente:</strong> {{ $obra['cliente'] }}</li>
                <li><strong>💰 Monto:</strong> {{ $obra['monto'] }}</li>
                <li><strong>⏳ Plazo:</strong> {{ $obra['plazo'] }}</li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach

      </div>

      {{-- Controles del carrusel --}}
      <button class="carousel-control-prev" type="button" data-bs-target="#obrasCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle shadow" style="padding: 12px;"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#obrasCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle shadow" style="padding: 12px;"></span>
      </button>
    </div>
  </div>
</section>

  {{-- /Obras Section --}}

  {{-- Clients Section --}}
  <section id="clients" class="clients section light-background">
    <div class="container" data-aos="fade-up">
      <div class="row gy-4">
        @foreach(range(1,6) as $i)
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset("assets/img/clients/client-{$i}.png") }}" class="img-fluid" alt="">
          </div>
        @endforeach
      </div>
    </div>
  </section>
  {{-- /Clients Section --}}

  {{-- Services Section --}}
  <section id="services" class="services section bg-light py-5">
  <div class="container section-title" data-aos="fade-up">
    <h2 class="text-center">Expedientes Técnicos</h2>
    <p class="text-center">Proyectos con documentación técnica especializada a nivel nacional</p>
  </div>

  <div class="container">
    <div class="row gy-4">
      @foreach([
        ['title'=>'Agua Potable – 9 de Octubre, Quillca, Alto Huaraya','snip'=>'381923','monto'=>'S/. 15,580,784.43','fecha'=>'28/01/2018'],
        ['title'=>'Piscina Municipal – Moho','snip'=>'360201','monto'=>'S/. 3,666,648.57','fecha'=>'25/07/2016'],
        ['title'=>'Agua Potable Zona Centro A – Putina','snip'=>'277689','monto'=>'S/. 10,354,800.65','fecha'=>'03/06/2015'],
        ['title'=>'Agua Potable Zona Centro B – Putina','snip'=>'285184','monto'=>'S/. 5,465,603.61','fecha'=>'03/06/2015'],
        ['title'=>'Saneamiento – Mijani y Uyuni','snip'=>'381738','monto'=>'S/. 5,844,468.00','fecha'=>'06/11/2017'],
        ['title'=>'Agua Potable Zona Sur – Putina','snip'=>'201053','monto'=>'S/. 9,537,052.00','fecha'=>'12/12/2017'],
        ['title'=>'Huancasayani – Cuyocuyo','snip'=>'244143','monto'=>'S/. 8,618,430.00','fecha'=>'17/04/2019'],
        ['title'=>'Huanacamaya y 24 de Junio – Santa Rosa','snip'=>'340235','monto'=>'S/. 2,614,362.00','fecha'=>'28/01/2018'],
        ['title'=>'Chapilaca, Kamani, Siruni, Chullunquiani','snip'=>'382325','monto'=>'S/. 3,646,259.00','fecha'=>'25/07/2018'],
        ['title'=>'Saneamiento – Alto Ccapuna','snip'=>'304565','monto'=>'S/. 3,409,782.00','fecha'=>'19/01/2015'],
        ['title'=>'Centro Comunal – Carumas','snip'=>'348756','monto'=>'S/. 379,068.07','fecha'=>'10/05/2016'],
        ['title'=>'Losa Multiuso – Carumas','snip'=>'348744','monto'=>'S/. 379,510.75','fecha'=>'10/05/2016'],
        ['title'=>'Agua Potable – Pusi','snip'=>'329848','monto'=>'S/. 6,878,560.00','fecha'=>'14/08/2019'],
        ['title'=>'Agua Potable y Alcantarillado – Cuyocuyo y Ura Ayllu','snip'=>'373582','monto'=>'S/. 15,180,452.69','fecha'=>'14/06/2019'],
        ['title'=>'Defensa Ribereña – Cuyocuyo – Ura Ayllu','snip'=>'2449275','monto'=>'S/. 13,246,324.00','fecha'=>'06/06/2019'],
        ['title'=>'Defensa Ribereña – Río Oriental','snip'=>'2448914','monto'=>'S/. 7,410,742.00','fecha'=>'06/06/2019']
      ] as $idx => $exp)
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 + ($idx * 50) }}">
          <div class="card h-100 shadow-sm border-0 rounded-3 p-3 small text-dark bg-white">
            <div class="d-flex align-items-start mb-2">
              <i class="bi bi-file-earmark-text-fill fs-4 text-primary me-2"></i>
              <h6 class="mb-0 fw-bold">{{ $exp['title'] }}</h6>
            </div>
            <ul class="list-unstyled mb-0">
              <li><strong>SNIP:</strong> {{ $exp['snip'] }}</li>
              <li><strong>Monto:</strong> {{ $exp['monto'] }}</li>
              <li><strong>Contrato:</strong> {{ $exp['fecha'] }}</li>
            </ul>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>


  {{-- /Services Section --}}


  {{-- Team Section --}}
  <section id="team" class="team section bg-white py-5">
  <div class="container section-title" data-aos="fade-up">
    <h2>Formulación de Perfiles Técnicos</h2>
    <p class="text-muted">Proyectos en etapa de preinversión y diseño técnico</p>
  </div>

  <div class="container">
    <div class="row g-4">
      @foreach([
        ['proyecto'=>'Mejoramiento y ampliación del sistema de riego a gravedad – Santísima Trinidad, Lloquecolla','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'flower1'],
        ['proyecto'=>'Instalación del sistema de riego – Tarucani, Peñón, Huayrachani','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'flower1'],
        ['proyecto'=>'Mejoramiento y ampliación de servicios de agua potable y saneamiento – 9 de Octubre, Quillca, Alto Huaraya','ubicacion'=>'Moho, Provincia de Moho – Puno','icon'=>'droplet-fill'],
        ['proyecto'=>'Mejoramiento de agua potable – San Isidro y Pedro Vilca Apaza','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'droplet-fill'],
        ['proyecto'=>'Instalación de agua potable y disposición sanitaria – Zona Centro A','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'droplet-fill'],
        ['proyecto'=>'Instalación de agua potable y disposición sanitaria – Zona Centro B','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'droplet-fill'],
        ['proyecto'=>'Mejoramiento del alcantarillado – Barrio Unión Miraflores','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'pipe'],
        ['proyecto'=>'Creación del centro comunal comercial – Arumas','ubicacion'=>'Carumas, Mariscal Nieto – Moquegua','icon'=>'building'],
        ['proyecto'=>'Creación de losa de recreación multiusos – Arumas','ubicacion'=>'Carumas, Mariscal Nieto – Moquegua','icon'=>'building']
      ] as $idx => $perfil)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="{{ 100 + ($idx * 60) }}">
          <div class="member position-relative shadow-sm border rounded-4 bg-light px-4 pt-5 pb-4 w-100">

            {{-- Badge ajustado fuera del flujo del título --}}
            <span class="badge bg-primary text-white position-absolute top-0 end-0 m-2 small rounded-pill px-3 py-1 z-3 shadow-sm">
              Perfil Técnico
            </span>

            <div class="d-flex align-items-start mb-3">
              <i class="bi bi-{{ $perfil['icon'] }} fs-3 text-primary me-3 mt-1"></i>
              <div>
                <h5 class="fw-bold mb-2 text-dark">{{ $perfil['proyecto'] }}</h5>
                <p class="text-muted small mb-0"><i class="bi bi-geo-alt-fill"></i> {{ $perfil['ubicacion'] }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
  {{-- /Team Section --}}

  {{-- Contact Section --}}
  <section id="contact" class="contact section bg-light py-5">
  <div class="container section-title text-center" data-aos="fade-up">
    <h2>Certificaciones ISO</h2>
    <p>Implementamos estándares internacionales para asegurar calidad, seguridad y sostenibilidad en todos nuestros servicios.</p>
  </div>

  <div class="container">
    <div class="row g-4 justify-content-center">

      {{-- ISO 9001 --}}
      <div class="col-md-4 col-sm-6 text-center" data-aos="zoom-in" data-aos-delay="100">
        <img src="{{ asset('assets/img/iso9001.png') }}" alt="ISO 9001" class="img-fluid mb-3" style="max-height: 100px;">
        <h5 class="fw-bold">ISO 9001</h5>
        <p class="small text-muted">Sistema de Gestión de Calidad</p>
      </div>

      {{-- ISO 14001 --}}
      <div class="col-md-4 col-sm-6 text-center" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('assets/img/iso14001.png') }}" alt="ISO 14001" class="img-fluid mb-3" style="max-height: 100px;">
        <h5 class="fw-bold">ISO 14001</h5>
        <p class="small text-muted">Sistema de Gestión Ambiental</p>
      </div>

      {{-- ISO 45001 --}}
      <div class="col-md-4 col-sm-6 text-center" data-aos="zoom-in" data-aos-delay="300">
        <img src="{{ asset('assets/img/iso45001.png') }}" alt="ISO 45001" class="img-fluid mb-3" style="max-height: 100px;">
        <h5 class="fw-bold">ISO 45001</h5>
        <p class="small text-muted">Sistema de Salud y Seguridad en el Trabajo</p>
      </div>

      {{-- ISO 50001 --}}
      <div class="col-md-4 col-sm-6 text-center" data-aos="zoom-in" data-aos-delay="400">
        <img src="{{ asset('assets/img/iso50001.png') }}" alt="ISO 50001" class="img-fluid mb-3" style="max-height: 100px;">
        <h5 class="fw-bold">ISO 50001</h5>
        <p class="small text-muted">Sistema de Gestión Energética</p>
      </div>

      {{-- ISO 37001 --}}
      <div class="col-md-4 col-sm-6 text-center" data-aos="zoom-in" data-aos-delay="500">
        <img src="{{ asset('assets/img/iso37001.png') }}" alt="ISO 37001" class="img-fluid mb-3" style="max-height: 100px;">
        <h5 class="fw-bold">ISO 37001</h5>
        <p class="small text-muted">Sistema de Gestión Antisoborno</p>
      </div>

    </div>
  </div>
</section>

  {{-- /Contact Section --}}

</main>
@endsection
