@extends('layouts.admin')
@section('title', 'Editar Expediente')
@section('page-title', 'Editar Expediente Técnico')

@section('content')
<div class="d-flex align-items-center mb-4 gap-2">
  <a href="{{ route('admin.expedientes.index') }}" class="btn btn-sm btn-outline-secondary">
    <i class="bi bi-arrow-left me-1"></i>Volver al listado
  </a>
</div>

<div class="admin-form-card">
  <div class="card-header">
    <i class="bi bi-pencil-fill me-2"></i>Editando: {{ Str::limit($expediente->title, 70) }}
  </div>
  <div class="card-body">
    <form action="{{ route('admin.expedientes.update', $expediente) }}" method="POST">
      @csrf @method('PUT')
      <div class="row g-4">
        <div class="col-12">
          <label class="form-label">Nombre del proyecto <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                 value="{{ old('title', $expediente->title) }}">
          @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Código SNIP / CUI <span class="text-danger">*</span></label>
          <input type="text" name="snip" class="form-control @error('snip') is-invalid @enderror"
                 value="{{ old('snip', $expediente->snip) }}">
          @error('snip')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Monto del expediente <span class="text-danger">*</span></label>
          <input type="text" name="monto" class="form-control @error('monto') is-invalid @enderror"
                 value="{{ old('monto', $expediente->monto) }}">
          @error('monto')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Fecha de contrato <span class="text-danger">*</span></label>
          <input type="text" name="fecha_contrato" class="form-control @error('fecha_contrato') is-invalid @enderror"
                 value="{{ old('fecha_contrato', $expediente->fecha_contrato) }}">
          @error('fecha_contrato')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Orden de visualización</label>
          <input type="number" name="orden" class="form-control" value="{{ old('orden', $expediente->orden) }}" min="0">
        </div>

        <div class="col-md-6 d-flex align-items-end">
          <div class="form-check form-switch mb-1">
            <input class="form-check-input" type="checkbox" name="activo" id="activo"
                   {{ old('activo', $expediente->activo) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="activo">Visible en el sitio</label>
          </div>
        </div>
      </div>

      <hr class="my-4">
      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-gecsa px-4">
          <i class="bi bi-save-fill me-2"></i>Actualizar Expediente
        </button>
        <a href="{{ route('admin.expedientes.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@endsection
