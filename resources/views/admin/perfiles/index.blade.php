@extends('layouts.admin')
@section('title', 'Perfiles Técnicos')
@section('page-title', 'Perfiles Técnicos')

@section('content')
<div class="admin-table">
  <div class="table-header">
    <h5><i class="bi bi-diagram-3-fill text-warning me-2"></i>Listado de Perfiles Técnicos</h5>
    <a href="{{ route('admin.perfiles.create') }}" class="btn btn-gecsa btn-sm">
      <i class="bi bi-plus-lg me-1"></i>Nuevo Perfil
    </a>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead>
        <tr>
          <th style="width:50px">#</th>
          <th style="width:50px">Icono</th>
          <th>Proyecto</th>
          <th>Ubicación</th>
          <th>Orden</th>
          <th>Estado</th>
          <th style="width:110px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($perfiles as $perfil)
        <tr>
          <td class="text-muted">{{ $perfil->id }}</td>
          <td class="text-center">
            <i class="bi bi-{{ $perfil->icon }} fs-5 text-primary"></i>
          </td>
          <td style="max-width:320px;">
            <div class="fw-semibold" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $perfil->proyecto }}</div>
          </td>
          <td class="small text-muted">{{ $perfil->ubicacion }}</td>
          <td><span class="badge bg-light text-dark border">{{ $perfil->orden }}</span></td>
          <td>
            @if($perfil->activo)
              <span class="badge badge-activo px-2 py-1 rounded-pill">Activo</span>
            @else
              <span class="badge badge-inactivo px-2 py-1 rounded-pill">Inactivo</span>
            @endif
          </td>
          <td>
            <div class="d-flex gap-1">
              <a href="{{ route('admin.perfiles.edit', $perfil) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                <i class="bi bi-pencil-fill"></i>
              </a>
              <form action="{{ route('admin.perfiles.destroy', $perfil) }}" method="POST"
                    onsubmit="return confirm('¿Eliminar este perfil técnico?')">
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
          <td colspan="7" class="text-center py-5 text-muted">
            <i class="bi bi-inbox fs-2 d-block mb-2"></i>No hay perfiles técnicos registrados.
            <a href="{{ route('admin.perfiles.create') }}" class="d-block mt-2">Crear el primero</a>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($perfiles->hasPages())
  <div class="p-3 border-top d-flex justify-content-center">
    {{ $perfiles->links() }}
  </div>
  @endif
</div>
@endsection
