<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExpedienteTecnico;

class ExpedientesSeeder extends Seeder
{
    public function run(): void
    {
        $expedientes = [
            ['title'=>'Agua Potable – 9 de Octubre, Quillca, Alto Huaraya','snip'=>'381923','monto'=>'S/. 15,580,784.43','fecha_contrato'=>'28/01/2018','orden'=>1],
            ['title'=>'Piscina Municipal – Moho','snip'=>'360201','monto'=>'S/. 3,666,648.57','fecha_contrato'=>'25/07/2016','orden'=>2],
            ['title'=>'Agua Potable Zona Centro A – Putina','snip'=>'277689','monto'=>'S/. 10,354,800.65','fecha_contrato'=>'03/06/2015','orden'=>3],
            ['title'=>'Agua Potable Zona Centro B – Putina','snip'=>'285184','monto'=>'S/. 5,465,603.61','fecha_contrato'=>'03/06/2015','orden'=>4],
            ['title'=>'Saneamiento – Mijani y Uyuni','snip'=>'381738','monto'=>'S/. 5,844,468.00','fecha_contrato'=>'06/11/2017','orden'=>5],
            ['title'=>'Agua Potable Zona Sur – Putina','snip'=>'201053','monto'=>'S/. 9,537,052.00','fecha_contrato'=>'12/12/2017','orden'=>6],
            ['title'=>'Huancasayani – Cuyocuyo','snip'=>'244143','monto'=>'S/. 8,618,430.00','fecha_contrato'=>'17/04/2019','orden'=>7],
            ['title'=>'Huanacamaya y 24 de Junio – Santa Rosa','snip'=>'340235','monto'=>'S/. 2,614,362.00','fecha_contrato'=>'28/01/2018','orden'=>8],
            ['title'=>'Chapilaca, Kamani, Siruni, Chullunquiani','snip'=>'382325','monto'=>'S/. 3,646,259.00','fecha_contrato'=>'25/07/2018','orden'=>9],
            ['title'=>'Saneamiento – Alto Ccapuna','snip'=>'304565','monto'=>'S/. 3,409,782.00','fecha_contrato'=>'19/01/2015','orden'=>10],
            ['title'=>'Centro Comunal – Carumas','snip'=>'348756','monto'=>'S/. 379,068.07','fecha_contrato'=>'10/05/2016','orden'=>11],
            ['title'=>'Losa Multiuso – Carumas','snip'=>'348744','monto'=>'S/. 379,510.75','fecha_contrato'=>'10/05/2016','orden'=>12],
            ['title'=>'Agua Potable – Pusi','snip'=>'329848','monto'=>'S/. 6,878,560.00','fecha_contrato'=>'14/08/2019','orden'=>13],
            ['title'=>'Agua Potable y Alcantarillado – Cuyocuyo y Ura Ayllu','snip'=>'373582','monto'=>'S/. 15,180,452.69','fecha_contrato'=>'14/06/2019','orden'=>14],
            ['title'=>'Defensa Ribereña – Cuyocuyo – Ura Ayllu','snip'=>'2449275','monto'=>'S/. 13,246,324.00','fecha_contrato'=>'06/06/2019','orden'=>15],
            ['title'=>'Defensa Ribereña – Río Oriental','snip'=>'2448914','monto'=>'S/. 7,410,742.00','fecha_contrato'=>'06/06/2019','orden'=>16],
        ];

        foreach ($expedientes as $exp) {
            ExpedienteTecnico::create(array_merge($exp, ['activo' => true]));
        }
    }
}
