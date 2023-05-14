<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kike;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $Kike = Kike::all();

        foreach($Kike as $Kike) 
        {  
            DB::table('piezas')->insert([
                'codigo' => $Kike['codigo'],
                'descripcion' => $Kike['descripcion'],
                'entradas' => $Kike['entradas'],
                'salidas' => $Kike['salidas'],
                'stock' => $Kike['stock'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        }
    }
}
