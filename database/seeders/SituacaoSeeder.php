<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $situacoes = [
            ['status' => 'Novo'],
            ['status' => 'Pendente'],
            ['status' => 'Resolvido']
        ];

        DB::table('situacoes')->insert($situacoes);
    }
}
