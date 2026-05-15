@extends('layouts.admin')
@section('title', 'Editar Obra')
@section('page-title', 'Editar Obra')

@section('content')
<div class="d-flex align-items-center mb-4 gap-2">
  <a href="{{ route('admin.obras.index') }}" class="btn btn-sm btn-outline-secondary">
    <i class="bi bi-arrow-left me-1"></i>Volver al listado
  </a>
</div>

<div class="admin-form-card">
  <div class="card-header">
    <i class="bi bi-pencil-fill me-2"></i>Editando: {{ Str::limit($obra->title, 60) }}
  </div>
  <div class="card-body">
    <form action="{{ route('admin.obras.update', $obra) }}" method="POST" enctype="multipart/form-data">
      @csrf @method('PUT')

      <div class="row g-4">
        <div class="col-12">
          <label class="form-label">Título de la obra <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                 value="{{ old('title', $obra->title) }}">
          @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Ubicación <span class="text-danger">*</span></label>
          <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror"
                 value="{{ old('ubicacion', $obra->ubicacion) }}">
          @error('ubicacion')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Cliente <span class="text-danger">*</span></label>
          <input type="text" name="cliente" class="form-control @error('cliente') is-invalid @enderror"
                 value="{{ old('cliente', $obra->cliente) }}">
          @error('cliente')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Monto del contrato <span class="text-danger">*</span></label>
          <input type="text" name="monto" class="form-control @error('monto') is-invalid @enderror"
                 value="{{ old('monto', $obra->monto) }}">
          @error('monto')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Plazo de ejecución <span class="text-danger">*</span></label>
          <input type="text" name="plazo" class="form-control @error('plazo') is-invalid @enderror"
                 value="{{ old('plazo', $obra->plazo) }}">
          @error('plazo')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Tipo de obra <span class="text-danger">*</span></label>
          <select name="tipo" class="form-select @error('tipo') is-invalid @enderror">
            <option value="ejecucion" {{ old('tipo', $obra->tipo) === 'ejecucion' ? 'selected' : '' }}>Ejecución</option>
            <option value="supervision" {{ old('tipo', $obra->tipo) === 'supervision' ? 'selected' : '' }}>Supervisión</option>
          </select>
          @error('tipo')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Cambiar imagen</label>
          @if($obra->img)
          <div class="mb-2">
            <img src="{{ asset('assets/img/' . $obra->img) }}" alt="Imagen actual"
                 class="rounded-3 shadow-sm" style="max-height:140px;" id="previewSrc">
            <small class="d-block text-muted mt-1">Imagen actual — sube una nueva para reemplazarla</small>
          </div>
          @else
          <img id="previewSrc" src="" class="rounded-3 shadow-sm d-none" style="max-height:140px;">
          @endif
          <input type="file" name="img" accept="image/*"
                 class="form-control @error('img') is-invalid @enderror"
                 onchange="previewImg(this)">
          <small class="text-muted">JPG, PNG o WebP. Máx. 2MB.</small>
          @error('img')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-3">
          <label class="form-label">Orden de visualización</label>
          <input type="number" name="orden" class="form-control" value="{{ old('orden', $obra->orden) }}" min="0">
        </div>

        <div class="col-md-3 d-flex align-items-end">
          <div class="form-check form-switch mb-1">
            <input class="form-check-input" type="checkbox" name="activo" id="activo"
                   {{ old('activo', $obra->activo) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="activo">Visible en el sitio</label>
          </div>
        </div>
      </div>

      <hr class="my-4">
      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-gecsa px-4">
          <i class="bi bi-save-fill me-2"></i>Actualizar Obra
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
      const img = document.getElementById('previewSrc');
      img.src = e.target.result;
      img.classList.remove('d-none');
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
