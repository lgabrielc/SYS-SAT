<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bloqpago extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloqpago')->insert([
            'codigo' => 'A',
            'nombre' => 'Bloquealo el pago',
        ]);
        DB::table('bloqpago')->insert([
            'codigo' => 'D',
            'nombre' => 'Pago por prestamo',
        ]);
        DB::table('bloqpago')->insert([
            'codigo' => 'F',
            'nombre' => 'Carta fianza pendiente',
        ]);
        DB::table('bloqpago')->insert([
            'codigo' => 'N',
            'nombre' => 'Trat.post',
        ]);
        DB::table('bloqpago')->insert([
            'codigo' => 'P',
            'nombre' => 'Orden de pago',
        ]);
        DB::table('bloqpago')->insert([
            'codigo' => 'R',
            'nombre' => 'Vent. de facturas',
        ]);
        DB::table('bloqpago')->insert([
            'codigo' => 'T',
            'nombre' => 'Bloqueo T. ',
        ]);
        DB::table('bloqpago')->insert([
            'codigo' => 'V',
            'nombre' => 'Traslado de pagos',
        ]);
    }
}
