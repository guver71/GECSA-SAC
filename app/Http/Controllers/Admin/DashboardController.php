<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obra;
use App\Models\ExpedienteTecnico;
use App\Models\PerfilTecnico;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalObras'       => Obra::count(),
            'totalExpedientes' => ExpedienteTecnico::count(),
            'totalPerfiles'    => PerfilTecnico::count(),
            'obrasActivas'     => Obra::where('activo', true)->count(),
        ]);
    }
}
