<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceso Admin | GECSA INGENIEROS</title>
  <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #0d2b35 0%, #065b5e 60%, #1dc8cd 100%);
      display: flex; align-items: center; justify-content: center;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }
    .login-card {
      background: #fff; border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0,0,0,.25);
      width: 100%; max-width: 420px; padding: 2.5rem;
    }
    .login-logo { max-height: 55px; }
    .login-title { font-size: 1.1rem; font-weight: 700; color: #0d2b35; }
    .login-subtitle { font-size: .85rem; color: #6b7280; }
    .form-control { border-radius: 8px; padding: .65rem 1rem; border-color: #d1d9e6; }
    .form-control:focus { border-color: #1dc8cd; box-shadow: 0 0 0 3px rgba(29,200,205,.15); }
    .btn-login {
      background: linear-gradient(135deg, #065b5e, #1dc8cd);
      border: none; color: #fff; border-radius: 8px;
      padding: .7rem; font-weight: 600; letter-spacing: .03em;
      transition: opacity .2s;
    }
    .btn-login:hover { opacity: .9; color: #fff; }
    .input-group-text { border-radius: 8px 0 0 8px !important; border-color: #d1d9e6; background: #f8fafc; }
    .input-group .form-control { border-radius: 0 8px 8px 0 !important; }
    .back-link { font-size: .8rem; color: rgba(255,255,255,.7); text-decoration: none; }
    .back-link:hover { color: #fff; }
  </style>
</head>
<body>
  <div>
    <div class="login-card">
      <div class="text-center mb-4">
        <img src="{{ asset('assets/img/gecsa.png') }}" alt="GECSA Logo" class="login-logo mb-3">
        <p class="login-title">Panel Administrativo</p>
        <p class="login-subtitle">Ingrese sus credenciales para continuar</p>
      </div>

      @if($errors->any())
      <div class="alert alert-danger alert-sm py-2 px-3 mb-3 rounded-3 small">
        <i class="bi bi-exclamation-triangle-fill me-1"></i>
        {{ $errors->first() }}
      </div>
      @endif

      <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label fw-semibold small">Correo electrónico</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope text-muted"></i></span>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="admin@gecsa.pe" required autofocus>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold small">Contraseña</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock text-muted"></i></span>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
          </div>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-4">
          <div class="form-check mb-0">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label small" for="remember">Recordarme</label>
          </div>
        </div>

        <button type="submit" class="btn btn-login w-100">
          <i class="bi bi-box-arrow-in-right me-2"></i>Ingresar
        </button>
      </form>

      <div class="text-center mt-4 pt-3 border-top">
        <a href="{{ route('home') }}" class="text-muted small text-decoration-none">
          <i class="bi bi-arrow-left me-1"></i>Volver al sitio web
        </a>
      </div>
    </div>
    <div class="text-center mt-3">
      <a href="{{ route('home') }}" class="back-link">
        <i class="bi bi-globe2 me-1"></i>GECSA INGENIEROS S.A.C.
      </a>
    </div>
  </div>
</body>
</html>
