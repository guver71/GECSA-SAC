<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerfilTecnico;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $perfiles = PerfilTecnico::orderBy('orden')->paginate(15);
        return view('admin.perfiles.index', compact('perfiles'));
    }

    public function create()
    {
        return view('admin.perfiles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'proyecto'  => 'required|string|max:500',
            'ubicacion' => 'required|string|max:255',
            'icon'      => 'required|string|max:50',
            'orden'     => 'nullable|integer|min:0',
            'activo'    => 'nullable|boolean',
        ]);

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? 0;

        PerfilTecnico::create($data);

        return redirect()->route('admin.perfiles.index')->with('success', 'Perfil técnico creado correctamente.');
    }

    public function show(PerfilTecnico $perfil)
    {
        return redirect()->route('admin.perfiles.edit', $perfil);
    }

    public function edit(PerfilTecnico $perfil)
    {
        return view('admin.perfiles.edit', compact('perfil'));
    }

    public function update(Request $request, PerfilTecnico $perfil)
    {
        $data = $request->validate([
            'proyecto'  => 'required|string|max:500',
            'ubicacion' => 'required|string|max:255',
            'icon'      => 'required|string|max:50',
            'orden'     => 'nullable|integer|min:0',
            'activo'    => 'nullable|boolean',
        ]);

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? $perfil->orden;

        $perfil->update($data);

        return redirect()->route('admin.perfiles.index')->with('success', 'Perfil técnico actualizado correctamente.');
    }

    public function destroy(PerfilTecnico $perfil)
    {
        $perfil->delete();
        return redirect()->route('admin.perfiles.index')->with('success', 'Perfil técnico eliminado correctamente.');
    }
}
