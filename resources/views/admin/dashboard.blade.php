@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="stat-icon" style="background:#dbeafe;">
          <i class="bi bi-building-fill-gear" style="color:#1d4ed8;"></i>
        </div>
        <span class="badge bg-primary-subtle text-primary rounded-pill">Obras</span>
      </div>
      <h2 class="fw-bold mb-0">{{ $totalObras }}</h2>
      <p class="text-muted small mb-0">Total registradas</p>
      <small class="text-success"><i class="bi bi-check-circle-fill me-1"></i>{{ $obrasActivas }} activas</small>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="stat-icon" style="background:#dcfce7;">
          <i class="bi bi-file-earmark-text-fill" style="color:#166534;"></i>
        </div>
        <span class="badge" style="background:#dcfce7;color:#166534;">Expedientes</span>
      </div>
      <h2 class="fw-bold mb-0">{{ $totalExpedientes }}</h2>
      <p class="text-muted small mb-0">Expedientes técnicos</p>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="stat-icon" style="background:#fef3c7;">
          <i class="bi bi-diagram-3-fill" style="color:#92400e;"></i>
        </div>
        <span class="badge" style="background:#fef3c7;color:#92400e;">Perfiles</span>
      </div>
      <h2 class="fw-bold mb-0">{{ $totalPerfiles }}</h2>
      <p class="text-muted small mb-0">Perfiles técnicos</p>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="stat-icon" style="background:#f3e8ff;">
          <i class="bi bi-globe2" style="color:#6b21a8;"></i>
        </div>
        <span class="badge" style="background:#f3e8ff;color:#6b21a8;">Web</span>
      </div>
      <h2 class="fw-bold mb-0">{{ $totalObras + $totalExpedientes + $totalPerfiles }}</h2>
      <p class="text-muted small mb-0">Registros totales publicados</p>
    </div>
  </div>
</div>

<div class="row g-4">
  <div class="col-lg-4 col-md-6">
    <div class="stat-card h-100">
      <h6 class="fw-bold mb-3"><i class="bi bi-lightning-charge-fill text-warning me-2"></i>Acciones Rápidas</h6>
      <div class="d-grid gap-2">
        <a href="{{ route('admin.obras.create') }}" class="btn btn-gecsa btn-sm">
          <i class="bi bi-plus-circle me-2"></i>Nueva Obra
        </a>
        <a href="{{ route('admin.expedientes.create') }}" class="btn btn-outline-secondary btn-sm">
          <i class="bi bi-plus-circle me-2"></i>Nuevo Expediente
        </a>
        <a href="{{ route('admin.perfiles.create') }}" class="btn btn-outline-secondary btn-sm">
          <i class="bi bi-plus-circle me-2"></i>Nuevo Perfil Técnico
        </a>
        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-info btn-sm">
          <i class="bi bi-eye me-2"></i>Ver Sitio Público
        </a>
      </div>
    </div>
  </div>

  <div class="col-lg-8 col-md-6">
    <div class="stat-card h-100">
      <h6 class="fw-bold mb-3"><i class="bi bi-info-circle-fill text-primary me-2"></i>Información del Sistema</h6>
      <div class="table-responsive">
        <table class="table table-sm table-borderless mb-0">
          <tbody>
            <tr>
              <td class="text-muted small fw-semibold" style="width:40%">Empresa</td>
              <td class="small">GECSA INGENIEROS S.A.C.</td>
            </tr>
            <tr>
              <td class="text-muted small fw-semibold">RUC</td>
              <td class="small">20604533051</td>
            </tr>
            <tr>
              <td class="text-muted small fw-semibold">Usuario activo</td>
              <td class="small">{{ Auth::user()->name }}</td>
            </tr>
            <tr>
              <td class="text-muted small fw-semibold">Correo</td>
              <td class="small">{{ Auth::user()->email }}</td>
            </tr>
            <tr>
              <td class="text-muted small fw-semibold">Versión del panel</td>
              <td class="small">1.0.0</td>
            </tr>
            <tr>
              <td class="text-muted small fw-semibold">Fecha del servidor</td>
              <td class="small">{{ now()->format('d/m/Y H:i') }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
