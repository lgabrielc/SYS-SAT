<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class proveedor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedor')->insert([
            'codigo' => '201219',
            'nombre' => 'Luz del Sur',
            'cuenta' => '6361111001',
        ]);
        DB::table('proveedor')->insert([
            'codigo' => '202455',
            'nombre' => 'Edelnor',
            'cuenta' => '6361111022',
        ]);
    }
}
