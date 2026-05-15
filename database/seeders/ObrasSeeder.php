<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obra;

class ObrasSeeder extends Seeder
{
    public function run(): void
    {
        $obras = [
            ['img'=>'obra1.png','title'=>'Agua Potable y Saneamiento - Challa Challa y Ccyarani','ubicacion'=>'Challhuahuacho, Cotabambas, Apurímac','cliente'=>'Municipalidad Distrital de Challhuahuacho','monto'=>'S/ 2,074,386.16','plazo'=>'18/05/2022 al 30/12/2022','tipo'=>'ejecucion','orden'=>1],
            ['img'=>'obra2.jpg','title'=>'Plaza Cívica en Tambillo','ubicacion'=>'Ituata, Carabaya, Puno','cliente'=>'Municipalidad Distrital de Ituata','monto'=>'S/ 417,867.03','plazo'=>'14/09/2021 al 31/12/2021','tipo'=>'ejecucion','orden'=>2],
            ['img'=>'obra3.png','title'=>'Plaza en la Comunidad de Pago Carabaya','ubicacion'=>'Ituata, Carabaya, Puno','cliente'=>'Municipalidad Distrital de Ituata','monto'=>'S/ 411,403.34','plazo'=>'14/09/2021 al 31/12/2021','tipo'=>'ejecucion','orden'=>3],
            ['img'=>'supervision1.png','title'=>'Supervisión: Transitabilidad A.H. El Provenir','ubicacion'=>'Jaqui, Caravelí, Arequipa','cliente'=>'Municipalidad Distrital de Jaqui','monto'=>'S/ 64,881.90','plazo'=>'15/12/2023 al 13/04/2024','tipo'=>'supervision','orden'=>4],
            ['img'=>'supervision2.jpg','title'=>'Supervisión: Institución Inicial N° 515 Pulpera','ubicacion'=>'Santo Tomás, Chumbivilcas, Cusco','cliente'=>'Municipalidad Provincial de Chumbivilcas','monto'=>'S/ 198,461.34','plazo'=>'21/12/2022 al 14/09/2023','tipo'=>'supervision','orden'=>5],
        ];

        foreach ($obras as $obra) {
            Obra::create(array_merge($obra, ['activo' => true]));
        }
    }
}
