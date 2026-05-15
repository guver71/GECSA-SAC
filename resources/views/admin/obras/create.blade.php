@extends('layouts.admin')
@section('title', 'Nueva Obra')
@section('page-title', 'Nueva Obra')

@section('content')
<div class="d-flex align-items-center mb-4 gap-2">
  <a href="{{ route('admin.obras.index') }}" class="btn btn-sm btn-outline-secondary">
    <i class="bi bi-arrow-left me-1"></i>Volver
  </a>
</div>

<div class="admin-form-card">
  <div class="card-header">
    <i class="bi bi-plus-circle-fill me-2"></i>Registrar Nueva Obra
  </div>
  <div class="card-body">
    <form action="{{ route('admin.obras.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row g-4">
        <div class="col-12">
          <label class="form-label">Título de la obra <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                 value="{{ old('title') }}" placeholder="Ej: Agua Potable y Saneamiento – Challa Challa">
          @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Ubicación <span class="text-danger">*</span></label>
          <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror"
                 value="{{ old('ubicacion') }}" placeholder="Distrito, Provincia, Región">
          @error('ubicacion')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Cliente <span class="text-danger">*</span></label>
          <input type="text" name="cliente" class="form-control @error('cliente') is-invalid @enderror"
                 value="{{ old('cliente') }}" placeholder="Municipalidad / Entidad contratante">
          @error('cliente')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Monto del contrato <span class="text-danger">*</span></label>
          <input type="text" name="monto" class="form-control @error('monto') is-invalid @enderror"
                 value="{{ old('monto') }}" placeholder="S/ 0,000,000.00">
          @error('monto')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Plazo de ejecución <span class="text-danger">*</span></label>
          <input type="text" name="plazo" class="form-control @error('plazo') is-invalid @enderror"
                 value="{{ old('plazo') }}" placeholder="DD/MM/AAAA al DD/MM/AAAA">
          @error('plazo')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Tipo de obra <span class="text-danger">*</span></label>
          <select name="tipo" class="form-select @error('tipo') is-invalid @enderror">
            <option value="ejecucion" {{ old('tipo') === 'ejecucion' ? 'selected' : '' }}>Ejecución</option>
            <option value="supervision" {{ old('tipo') === 'supervision' ? 'selected' : '' }}>Supervisión</option>
          </select>
          @error('tipo')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Imagen de la obra</label>
          <input type="file" name="img" id="imgInput" accept="image/*"
                 class="form-control @error('img') is-invalid @enderror"
                 onchange="previewImg(this)">
          <small class="text-muted">JPG, PNG o WebP. Máx. 2MB.</small>
          @error('img')<div class="invalid-feedback">{{ $message }}</div>@enderror
          <div id="imgPreview" class="mt-2 d-none">
            <img id="previewSrc" src="" alt="Vista previa" class="rounded-3 shadow-sm" style="max-height:160px;">
          </div>
        </div>

        <div class="col-md-3">
          <label class="form-label">Orden de visualización</label>
          <input type="number" name="orden" class="form-control" value="{{ old('orden', 0) }}" min="0">
          <small class="text-muted">Menor número = aparece primero</small>
        </div>

        <div class="col-md-3 d-flex align-items-end">
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
          <i class="bi bi-save-fill me-2"></i>Guardar Obra
        </button>
        <a href="{{ route('admin.obras.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
function previewImg(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = e => {
      document.getElementById('previewSrc').src = e.target.result;
      document.getElementById('imgPreview').classList.remove('d-none');
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
