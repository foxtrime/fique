<?php

use Illuminate\Database\Seeder;

class Almoxarifado_PerguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('almoxarifado_perguntas')->insert(['titulo' => 'Falta de material - Insumo']);
        DB::table('almoxarifado_perguntas')->insert(['titulo' => 'Falta de material - Limpeza']);
        DB::table('almoxarifado_perguntas')->insert(['titulo' => 'Falta de material - Escritório']);
    }
}
