<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\ExpedienteTecnico;
use App\Models\PerfilTecnico;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'obras'       => Obra::activos()->get(),
            'expedientes' => ExpedienteTecnico::activos()->get(),
            'perfiles'    => PerfilTecnico::activos()->get(),
        ]);
    }
}
