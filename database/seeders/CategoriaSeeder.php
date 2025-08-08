<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Categorias = ['Vestidos', 'Faldas', 'Blusas', 'Jeans', 'Camisas'];
          
        foreach ($Categorias as $categoria) {
DB::table('categorias')->insert([
                'nombre' => $categoria,
               
            ]);
        }
    }
}
