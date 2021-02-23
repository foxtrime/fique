<?php

use Illuminate\Database\Seeder;

class Imunizacao_PerguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imunizacao_perguntas')->insert(['titulo' => 'Falta de material - Insumo']);
        DB::table('imunizacao_perguntas')->insert(['titulo' => 'Todas as vacinas estão completas?']);
    }
}
