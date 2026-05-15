<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin') | GECSA Panel</title>
  <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <style>
    :root {
      --sidebar-bg: #0d2b35;
      --sidebar-hover: #1a4a5c;
      --sidebar-active: #1dc8cd;
      --sidebar-width: 260px;
      --header-height: 60px;
      --accent: #1dc8cd;
      --accent-dark: #065b5e;
    }

    body { background: #f0f4f7; font-family: 'Segoe UI', system-ui, sans-serif; }

    /* Sidebar */
    .admin-sidebar {
      position: fixed; top: 0; left: 0;
      width: var(--sidebar-width); height: 100vh;
      background: var(--sidebar-bg);
      display: flex; flex-direction: column;
      z-index: 1000; transition: transform .3s ease;
      overflow-y: auto;
    }
    .sidebar-brand {
      padding: 1.25rem 1.5rem;
      border-bottom: 1px solid rgba(255,255,255,.08);
    }
    .sidebar-brand img { max-height: 40px; }
    .sidebar-brand small { color: rgba(255,255,255,.5); font-size: .7rem; display:block; margin-top: 2px; }

    .sidebar-nav { flex: 1; padding: 1rem 0; }
    .nav-label {
      color: rgba(255,255,255,.35); font-size: .65rem; font-weight: 700;
      letter-spacing: .1em; text-transform: uppercase;
      padding: .5rem 1.5rem .25rem;
    }
    .sidebar-nav .nav-link {
      display: flex; align-items: center; gap: .75rem;
      color: rgba(255,255,255,.7); padding: .65rem 1.5rem;
      border-radius: 0; font-size: .875rem; transition: all .2s;
      border-left: 3px solid transparent;
    }
    .sidebar-nav .nav-link:hover {
      background: var(--sidebar-hover); color: #fff;
      border-left-color: var(--accent);
    }
    .sidebar-nav .nav-link.active {
      background: var(--sidebar-hover); color: var(--accent);
      border-left-color: var(--accent); font-weight: 600;
    }
    .sidebar-nav .nav-link i { font-size: 1.1rem; width: 22px; text-align: center; }

    .sidebar-footer {
      padding: 1rem 1.5rem;
      border-top: 1px solid rgba(255,255,255,.08);
      font-size: .8rem; color: rgba(255,255,255,.4);
    }

    /* Main content */
    .admin-main {
      margin-left: var(--sidebar-width);
      min-height: 100vh;
      display: flex; flex-direction: column;
    }
    .admin-header {
      position: sticky; top: 0; z-index: 900;
      height: var(--header-height);
      background: #fff;
      border-bottom: 1px solid #e3e8ee;
      display: flex; align-items: center;
      padding: 0 1.5rem; gap: 1rem;
      box-shadow: 0 1px 4px rgba(0,0,0,.06);
    }
    .admin-header .page-title { font-size: 1rem; font-weight: 600; color: #1a2e3b; margin: 0; }
    .admin-header .btn-toggle { display: none; }

    .admin-content { flex: 1; padding: 1.75rem 1.75rem; }

    /* Cards */
    .stat-card {
      background: #fff; border-radius: 12px;
      padding: 1.5rem; box-shadow: 0 1px 6px rgba(0,0,0,.07);
      border: 1px solid #e8edf2;
      transition: transform .2s, box-shadow .2s;
    }
    .stat-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,.1); }
    .stat-icon {
      width: 48px; height: 48px; border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.4rem;
    }

    /* Table */
    .admin-table { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 1px 6px rgba(0,0,0,.07); }
    .admin-table .table { margin: 0; }
    .admin-table .table thead th { background: #f8fafc; border-bottom: 2px solid #e3e8ee; font-size: .8rem; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; color: #64748b; padding: .85rem 1rem; }
    .admin-table .table tbody td { padding: .85rem 1rem; vertical-align: middle; border-color: #f1f5f9; font-size: .875rem; }
    .admin-table .table-header { padding: 1.25rem 1.5rem; border-bottom: 1px solid #e8edf2; display: flex; align-items: center; justify-content: space-between; }
    .admin-table .table-header h5 { margin: 0; font-size: 1rem; font-weight: 600; }

    /* Forms */
    .admin-form-card { background: #fff; border-radius: 12px; box-shadow: 0 1px 6px rgba(0,0,0,.07); overflow: hidden; }
    .admin-form-card .card-header { background: var(--accent-dark); color: #fff; padding: 1.25rem 1.5rem; font-weight: 600; }
    .admin-form-card .card-body { padding: 1.75rem; }
    .form-label { font-weight: 600; font-size: .875rem; color: #374151; }
    .form-control, .form-select { border-radius: 8px; border-color: #d1d9e6; font-size: .875rem; }
    .form-control:focus, .form-select:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(29,200,205,.15); }

    /* Buttons */
    .btn-gecsa { background: var(--accent-dark); color: #fff; border: none; }
    .btn-gecsa:hover { background: var(--accent); color: #fff; }
    .btn-gecsa-outline { border: 2px solid var(--accent-dark); color: var(--accent-dark); }
    .btn-gecsa-outline:hover { background: var(--accent-dark); color: #fff; }

    /* Badges */
    .badge-activo { background: #dcfce7; color: #166534; }
    .badge-inactivo { background: #fef2f2; color: #991b1b; }

    /* Toast alert */
    .alert-toast {
      position: fixed; bottom: 1.5rem; right: 1.5rem;
      z-index: 9999; min-width: 300px;
      border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,.15);
      animation: slideIn .3s ease;
    }
    @keyframes slideIn { from { transform: translateX(120%); } to { transform: translateX(0); } }

    /* Responsive */
    @media (max-width: 991px) {
      .admin-sidebar { transform: translateX(-100%); }
      .admin-sidebar.show { transform: translateX(0); }
      .admin-main { margin-left: 0; }
      .admin-header .btn-toggle { display: block; }
      .sidebar-overlay { position: fixed; inset: 0; background: rgba(0,0,0,.5); z-index: 999; display: none; }
      .sidebar-overlay.show { display: block; }
    }
  </style>
  @stack('styles')
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<aside class="admin-sidebar" id="adminSidebar">
  <div class="sidebar-brand">
    <img src="{{ asset('assets/img/gecsa.png') }}" alt="GECSA Logo">
    <small>Panel Administrativo</small>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-label">Principal</div>
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <i class="bi bi-grid-1x2-fill"></i> Dashboard
    </a>

    <div class="nav-label mt-2">Contenido</div>
    <a href="{{ route('admin.obras.index') }}" class="nav-link {{ request()->routeIs('admin.obras.*') ? 'active' : '' }}">
      <i class="bi bi-building-fill-gear"></i> Obras
    </a>
    <a href="{{ route('admin.expedientes.index') }}" class="nav-link {{ request()->routeIs('admin.expedientes.*') ? 'active' : '' }}">
      <i class="bi bi-file-earmark-text-fill"></i> Expedientes Técnicos
    </a>
    <a href="{{ route('admin.perfiles.index') }}" class="nav-link {{ request()->routeIs('admin.perfiles.*') ? 'active' : '' }}">
      <i class="bi bi-diagram-3-fill"></i> Perfiles Técnicos
    </a>

    <div class="nav-label mt-2">Sitio Web</div>
    <a href="{{ route('home') }}" target="_blank" class="nav-link">
      <i class="bi bi-globe2"></i> Ver Sitio Público
    </a>
  </nav>

  <div class="sidebar-footer">
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-sm btn-outline-danger w-100">
        <i class="bi bi-box-arrow-left me-1"></i> Cerrar Sesión
      </button>
    </form>
    <div class="mt-2 text-center">v1.0 &mdash; GECSA 2024</div>
  </div>
</aside>

<div class="admin-main">
  <header class="admin-header">
    <button class="btn btn-sm btn-outline-secondary btn-toggle" onclick="toggleSidebar()">
      <i class="bi bi-list fs-5"></i>
    </button>
    <h1 class="page-title">@yield('page-title', 'Panel de Administración')</h1>
    <div class="ms-auto d-flex align-items-center gap-2">
      <span class="text-muted small d-none d-md-inline">
        <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
      </span>
    </div>
  </header>

  <main class="admin-content">
    @if(session('success'))
    <div class="alert alert-success alert-toast alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-toast alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @yield('content')
  </main>
</div>

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
function toggleSidebar() {
  document.getElementById('adminSidebar').classList.toggle('show');
  document.getElementById('sidebarOverlay').classList.toggle('show');
}
setTimeout(() => {
  document.querySelectorAll('.alert-toast').forEach(el => {
    const a = bootstrap.Alert.getOrCreateInstance(el);
    setTimeout(() => a.close(), 4000);
  });
}, 100);
</script>
@stack('scripts')
</body>
</html>
