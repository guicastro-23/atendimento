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
        $categorias = [
            ['tipo' => 'Suporte'],
            ['tipo' => 'Financeiro'],
            ['tipo' => 'Administrativo'],
            ['tipo' => 'Comercial'],
            ['tipo' => 'Jurídico']
            ];
        
        DB::table('categorias')->insert($categorias);
    }
}
