<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObraController extends Controller
{
    public function index()
    {
        $obras = Obra::orderBy('orden')->paginate(10);
        return view('admin.obras.index', compact('obras'));
    }

    public function create()
    {
        return view('admin.obras.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'cliente'   => 'required|string|max:255',
            'monto'     => 'required|string|max:100',
            'plazo'     => 'required|string|max:100',
            'tipo'      => 'required|in:ejecucion,supervision',
            'orden'     => 'nullable|integer|min:0',
            'activo'    => 'nullable|boolean',
            'img'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/obras'), $filename);
            $data['img'] = 'obras/' . $filename;
        }

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? 0;

        Obra::create($data);

        return redirect()->route('admin.obras.index')->with('success', 'Obra creada correctamente.');
    }

    public function show(Obra $obra)
    {
        return redirect()->route('admin.obras.edit', $obra);
    }

    public function edit(Obra $obra)
    {
        return view('admin.obras.edit', compact('obra'));
    }

    public function update(Request $request, Obra $obra)
    {
        $data = $request->validate([
            'title'     => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'cliente'   => 'required|string|max:255',
            'monto'     => 'required|string|max:100',
            'plazo'     => 'required|string|max:100',
            'tipo'      => 'required|in:ejecucion,supervision',
            'orden'     => 'nullable|integer|min:0',
            'activo'    => 'nullable|boolean',
            'img'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('img')) {
            if ($obra->img && str_starts_with($obra->img, 'obras/') && file_exists(public_path('assets/img/' . $obra->img))) {
                unlink(public_path('assets/img/' . $obra->img));
            }
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/obras'), $filename);
            $data['img'] = 'obras/' . $filename;
        }

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? $obra->orden;

        $obra->update($data);

        return redirect()->route('admin.obras.index')->with('success', 'Obra actualizada correctamente.');
    }

    public function destroy(Obra $obra)
    {
        if ($obra->img && str_starts_with($obra->img, 'obras/') && file_exists(public_path('assets/img/' . $obra->img))) {
            unlink(public_path('assets/img/' . $obra->img));
        }
        $obra->delete();
        return redirect()->route('admin.obras.index')->with('success', 'Obra eliminada correctamente.');
    }
}
