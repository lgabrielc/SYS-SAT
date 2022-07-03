<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class viapago extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('viapago')->insert([
            'codigo' => '0',
            'nombre' => 'Abonos Iterbancarios',
        ]);
        DB::table('viapago')->insert([
            'codigo' => '1',
            'nombre' => 'PAGOS SUNAT',
        ]);
        DB::table('viapago')->insert([
            'codigo' => '2',
            'nombre' => 'PAGOS DETRACCION',
        ]);
        DB::table('viapago')->insert([
            'codigo' => '3',
            'nombre' => 'PAGOS POR OBLIGACIONES',
        ]);
        DB::table('viapago')->insert([
            'codigo' => '4',
            'nombre' => 'ABONO EN CTA INTERBANCARIA',
        ]);
        DB::table('viapago')->insert([
            'codigo' => '5',
            'nombre' => 'Cheques Gerencia (USD, S/.1)',
        ]);
        DB::table('viapago')->insert([
            'codigo' => '6',
            'nombre' => 'NONET. BIF CTA 337052 MB',
        ]);
        DB::table('viapago')->insert([
            'codigo' => '7',
            'nombre' => 'CONTR. BIF CTA 337060 MN',
        ]);
        DB::table('viapago')->insert([
            'codigo' => '8',
            'nombre' => 'CTA PRINCIPAL 337079 ME',
        ]);
        DB::table('viapago')->insert([
            'codigo' => '9',
            'nombre' => 'PAGO EN EFECTIVO',
        ]);
        DB::table('viapago')->insert([
            'codigo' => 'A',
            'nombre' => 'CARTA.BIRF(CONTR.$.S/WE-INTE)',
        ]);
        DB::table('viapago')->insert([
            'codigo' => 'B',
            'nombre' => 'CHEQUE GERENCIA EPE',
        ]);
        DB::table('viapago')->insert([
            'codigo' => 'C',
            'nombre' => 'CARTA ORDEN',
        ]);
        DB::table('viapago')->insert([
            'codigo' => 'D',
            'nombre' => 'CARTA-BIFS/CE S/Y $ WJES-INTER',
        ]);
        DB::table('viapago')->insert([
            'codigo' => 'E',
            'nombre' => 'CHEQUE GERENCIA EPE',
        ]);
        DB::table('viapago')->insert([
            'codigo' => 'F',
            'nombre' => 'CHEQUE GERENCIA EPE',
        ]);
    }
}