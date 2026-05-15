@extends('layouts.admin')
@section('title', 'Expedientes Técnicos')
@section('page-title', 'Expedientes Técnicos')

@section('content')
<div class="admin-table">
  <div class="table-header">
    <h5><i class="bi bi-file-earmark-text-fill text-success me-2"></i>Listado de Expedientes</h5>
    <a href="{{ route('admin.expedientes.create') }}" class="btn btn-gecsa btn-sm">
      <i class="bi bi-plus-lg me-1"></i>Nuevo Expediente
    </a>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead>
        <tr>
          <th style="width:50px">#</th>
          <th>Título del Proyecto</th>
          <th>SNIP</th>
          <th>Monto</th>
          <th>Fecha Contrato</th>
          <th>Orden</th>
          <th>Estado</th>
          <th style="width:110px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($expedientes as $exp)
        <tr>
          <td class="text-muted">{{ $exp->id }}</td>
          <td style="max-width:300px;">
            <div class="fw-semibold" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $exp->title }}</div>
          </td>
          <td><code class="small">{{ $exp->snip }}</code></td>
          <td class="fw-semibold small">{{ $exp->monto }}</td>
          <td class="small text-muted">{{ $exp->fecha_contrato }}</td>
          <td><span class="badge bg-light text-dark border">{{ $exp->orden }}</span></td>
          <td>
            @if($exp->activo)
              <span class="badge badge-activo px-2 py-1 rounded-pill">Activo</span>
            @else
              <span class="badge badge-inactivo px-2 py-1 rounded-pill">Inactivo</span>
            @endif
          </td>
          <td>
            <div class="d-flex gap-1">
              <a href="{{ route('admin.expedientes.edit', $exp) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                <i class="bi bi-pencil-fill"></i>
              </a>
              <form action="{{ route('admin.expedientes.destroy', $exp) }}" method="POST"
                    onsubmit="return confirm('¿Eliminar este expediente?')">
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
            <i class="bi bi-inbox fs-2 d-block mb-2"></i>No hay expedientes registrados.
            <a href="{{ route('admin.expedientes.create') }}" class="d-block mt-2">Crear el primero</a>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($expedientes->hasPages())
  <div class="p-3 border-top d-flex justify-content-center">
    {{ $expedientes->links() }}
  </div>
  @endif
</div>
@endsection
