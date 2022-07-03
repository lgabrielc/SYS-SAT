<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuministroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suministro')->insert([
            'codigo' => '1416039',
            'direccion' => 'Cruce de la Av. Revolucion y Universita',
            'distrito' => 'La Victoria',
        ]);
        DB::table('suministro')->insert([
            'codigo' => '1204288',
            'direccion' => 'Via de Evitamiento Pista Aux. a 50 mts/faraday',
            'distrito' => 'Ate-Vitarte',
        ]);
        DB::table('suministro')->insert([
            'codigo' => '1347606',
            'direccion' => 'Angamos y San Lorenzo',
            'distrito' => 'Surquillo',
        ]);
        DB::table('suministro')->insert([
            'codigo' => '1379183',
            'direccion' => 'Buenas Vista Esq. Av.Primavera',
            'distrito' => 'Surco',
        ]);
        DB::table('suministro')->insert([
            'codigo' => '1399535',
            'direccion' => 'Cruce de la Av. Revolucion y Universita',
            'distrito' => 'Villa el Salvador',
        ]);
        DB::table('suministro')->insert([
            'codigo' => '1408977',
            'direccion' => 'Iquitos Con Av.Ayacacucho P.J. Jose Galvez',
            'distrito' => 'Villa Maria del Triunfo',
        ]);
    }
}
