<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//LLamamos storage para que se pueda crear nuestra carpeta posts donde se almaceraran las imagenes
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(proveedor::class);
        $this->call(bloqpago::class);
        $this->call(viapago::class);
        $this->call(SuministroSeeder::class);
        // Storage::deleteDirectory('posts');
        // Storage::makeDirectory('posts');
        // \App\Models\User::factory(10)->create();
        //  \App\Models\Post::factory(100)->create();
    }
}
