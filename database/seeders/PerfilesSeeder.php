<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerfilTecnico;

class PerfilesSeeder extends Seeder
{
    public function run(): void
    {
        $perfiles = [
            ['proyecto'=>'Mejoramiento y ampliación del sistema de riego a gravedad – Santísima Trinidad, Lloquecolla','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'flower1','orden'=>1],
            ['proyecto'=>'Instalación del sistema de riego – Tarucani, Peñón, Huayrachani','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'flower1','orden'=>2],
            ['proyecto'=>'Mejoramiento y ampliación de servicios de agua potable y saneamiento – 9 de Octubre, Quillca, Alto Huaraya','ubicacion'=>'Moho, Provincia de Moho – Puno','icon'=>'droplet-fill','orden'=>3],
            ['proyecto'=>'Mejoramiento de agua potable – San Isidro y Pedro Vilca Apaza','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'droplet-fill','orden'=>4],
            ['proyecto'=>'Instalación de agua potable y disposición sanitaria – Zona Centro A','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'droplet-fill','orden'=>5],
            ['proyecto'=>'Instalación de agua potable y disposición sanitaria – Zona Centro B','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'droplet-fill','orden'=>6],
            ['proyecto'=>'Mejoramiento del alcantarillado – Barrio Unión Miraflores','ubicacion'=>'Putina, San Antonio de Putina – Puno','icon'=>'pipe','orden'=>7],
            ['proyecto'=>'Creación del centro comunal comercial – Arumas','ubicacion'=>'Carumas, Mariscal Nieto – Moquegua','icon'=>'building','orden'=>8],
            ['proyecto'=>'Creación de losa de recreación multiusos – Arumas','ubicacion'=>'Carumas, Mariscal Nieto – Moquegua','icon'=>'building','orden'=>9],
        ];

        foreach ($perfiles as $perfil) {
            PerfilTecnico::create(array_merge($perfil, ['activo' => true]));
        }
    }
}
