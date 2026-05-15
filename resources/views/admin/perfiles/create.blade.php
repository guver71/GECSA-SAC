@extends('layouts.admin')
@section('title', 'Nuevo Perfil Técnico')
@section('page-title', 'Nuevo Perfil Técnico')

@section('content')
<div class="d-flex align-items-center mb-4 gap-2">
  <a href="{{ route('admin.perfiles.index') }}" class="btn btn-sm btn-outline-secondary">
    <i class="bi bi-arrow-left me-1"></i>Volver
  </a>
</div>

<div class="admin-form-card">
  <div class="card-header">
    <i class="bi bi-plus-circle-fill me-2"></i>Registrar Nuevo Perfil Técnico
  </div>
  <div class="card-body">
    <form action="{{ route('admin.perfiles.store') }}" method="POST">
      @csrf
      <div class="row g-4">
        <div class="col-12">
          <label class="form-label">Nombre del proyecto <span class="text-danger">*</span></label>
          <textarea name="proyecto" rows="2"
                    class="form-control @error('proyecto') is-invalid @enderror"
                    placeholder="Ej: Mejoramiento y ampliación del sistema de riego...">{{ old('proyecto') }}</textarea>
          @error('proyecto')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-8">
          <label class="form-label">Ubicación <span class="text-danger">*</span></label>
          <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror"
                 value="{{ old('ubicacion') }}" placeholder="Distrito, Provincia – Región">
          @error('ubicacion')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Icono Bootstrap Icons <span class="text-danger">*</span></label>
          <div class="input-group">
            <span class="input-group-text" id="iconPreview">
              <i class="bi bi-building" id="iconDisplay"></i>
            </span>
            <input type="text" name="icon" id="iconInput"
                   class="form-control @error('icon') is-invalid @enderror"
                   value="{{ old('icon', 'building') }}"
                   placeholder="building, droplet-fill, pipe..."
                   oninput="updateIcon(this.value)">
          </div>
          <small class="text-muted">
            Nombre del icono de
            <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener">Bootstrap Icons</a>
          </small>
          @error('icon')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror

          <div class="mt-2 d-flex flex-wrap gap-2">
            @foreach(['building','droplet-fill','flower1','pipe','diagram-3','hammer','tools','geo-alt-fill','water'] as $ic)
            <button type="button" class="btn btn-sm btn-outline-secondary icon-chip"
                    onclick="selectIcon('{{ $ic }}')">
              <i class="bi bi-{{ $ic }}"></i>
            </button>
            @endforeach
          </div>
        </div>

        <div class="col-md-6">
          <label class="form-label">Orden de visualización</label>
          <input type="number" name="orden" class="form-control" value="{{ old('orden', 0) }}" min="0">
          <small class="text-muted">Menor número = aparece primero</small>
        </div>

        <div class="col-md-6 d-flex align-items-end">
          <div class="form-check form-switch mb-1">
            <input class="form-check-input" type="checkbox" name="activo" id="activo"
                   {{ old('activo', true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="activo">Visible en el sitio</label>
          </div>
        </div>
      </div>

      <hr class="my-4">
      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-gecsa px-4">
          <i class="bi bi-save-fill me-2"></i>Guardar Perfil
        </button>
        <a href="{{ route('admin.perfiles.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
function updateIcon(name) {
  document.getElementById('iconDisplay').className = 'bi bi-' + (name || 'building');
}
function selectIcon(name) {
  document.getElementById('iconInput').value = name;
  updateIcon(name);
}
</script>
@endpush
