<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExpedienteTecnico;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = ExpedienteTecnico::orderBy('orden')->paginate(15);
        return view('admin.expedientes.index', compact('expedientes'));
    }

    public function create()
    {
        return view('admin.expedientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'snip'           => 'required|string|max:50',
            'monto'          => 'required|string|max:100',
            'fecha_contrato' => 'required|string|max:50',
            'orden'          => 'nullable|integer|min:0',
            'activo'         => 'nullable|boolean',
        ]);

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? 0;

        ExpedienteTecnico::create($data);

        return redirect()->route('admin.expedientes.index')->with('success', 'Expediente creado correctamente.');
    }

    public function show(ExpedienteTecnico $expediente)
    {
        return redirect()->route('admin.expedientes.edit', $expediente);
    }

    public function edit(ExpedienteTecnico $expediente)
    {
        return view('admin.expedientes.edit', compact('expediente'));
    }

    public function update(Request $request, ExpedienteTecnico $expediente)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'snip'           => 'required|string|max:50',
            'monto'          => 'required|string|max:100',
            'fecha_contrato' => 'required|string|max:50',
            'orden'          => 'nullable|integer|min:0',
            'activo'         => 'nullable|boolean',
        ]);

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? $expediente->orden;

        $expediente->update($data);

        return redirect()->route('admin.expedientes.index')->with('success', 'Expediente actualizado correctamente.');
    }

    public function destroy(ExpedienteTecnico $expediente)
    {
        $expediente->delete();
        return redirect()->route('admin.expedientes.index')->with('success', 'Expediente eliminado correctamente.');
    }
}
