@extends('layouts.admin')
@section('title', 'Obras')
@section('page-title', 'Obras Ejecutadas y Supervisadas')

@section('content')
<div class="admin-table">
  <div class="table-header">
    <h5><i class="bi bi-building-fill-gear text-primary me-2"></i>Listado de Obras</h5>
    <a href="{{ route('admin.obras.create') }}" class="btn btn-gecsa btn-sm">
      <i class="bi bi-plus-lg me-1"></i>Nueva Obra
    </a>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead>
        <tr>
          <th style="width:50px">#</th>
          <th style="width:70px">Imagen</th>
          <th>Título</th>
          <th>Tipo</th>
          <th>Monto</th>
          <th>Orden</th>
          <th>Estado</th>
          <th style="width:130px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($obras as $obra)
        <tr>
          <td class="text-muted">{{ $obra->id }}</td>
          <td>
            @if($obra->img)
              <img src="{{ asset('assets/img/' . $obra->img) }}" alt="{{ $obra->title }}"
                   style="width:55px;height:40px;object-fit:cover;border-radius:6px;">
            @else
              <div style="width:55px;height:40px;background:#f1f5f9;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                <i class="bi bi-image text-muted"></i>
              </div>
            @endif
          </td>
          <td>
            <div class="fw-semibold" style="max-width:280px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $obra->title }}</div>
            <small class="text-muted">{{ $obra->ubicacion }}</small>
          </td>
          <td>
            @if($obra->tipo === 'supervision')
              <span class="badge bg-warning text-dark">Supervisión</span>
            @else
              <span class="badge bg-primary">Ejecución</span>
            @endif
          </td>
          <td class="fw-semibold small">{{ $obra->monto }}</td>
          <td><span class="badge bg-light text-dark border">{{ $obra->orden }}</span></td>
          <td>
            @if($obra->activo)
              <span class="badge badge-activo px-2 py-1 rounded-pill">Activo</span>
            @else
              <span class="badge badge-inactivo px-2 py-1 rounded-pill">Inactivo</span>
            @endif
          </td>
          <td>
            <div class="d-flex gap-1">
              <a href="{{ route('admin.obras.edit', $obra) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                <i class="bi bi-pencil-fill"></i>
              </a>
              <form action="{{ route('admin.obras.destroy', $obra) }}" method="POST"
                    onsubmit="return confirm('¿Eliminar esta obra?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                  <i class="bi bi-trash-fill"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="8" class="text-center py-5 text-muted">
            <i class="bi bi-inbox fs-2 d-block mb-2"></i>No hay obras registradas.
            <a href="{{ route('admin.obras.create') }}" class="d-block mt-2">Crear la primera</a>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($obras->hasPages())
  <div class="p-3 border-top d-flex justify-content-center">
    {{ $obras->links() }}
  </div>
  @endif
</div>
@endsection
