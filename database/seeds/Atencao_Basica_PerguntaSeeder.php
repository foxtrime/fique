<?php

use Illuminate\Database\Seeder;

class Atencao_Basica_PerguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atencao_basica_perguntas')->insert(['titulo' => 'A agenda médica, enfermagem e técnicos está completa?']);
        DB::table('atencao_basica_perguntas')->insert(['titulo' => 'Tem day off (médicos, enfermagem e técnicos) na unidade?']);
        DB::table('atencao_basica_perguntas')->insert(['titulo' => 'Atrasos?']);
        DB::table('atencao_basica_perguntas')->insert(['titulo' => 'Número de Visitas Domiciliares – Médicos/ Enfermeiros e técnicos em vd (nominal)']);
        DB::table('atencao_basica_perguntas')->insert(['titulo' => 'Quantidade de demandas espontâneas por equipe ']);
        DB::table('atencao_basica_perguntas')->insert(['titulo' => 'Todos estão devidamente uniformizados?']);
        DB::table('atencao_basica_perguntas')->insert(['titulo' => 'Qual médico responsável por fechar a unidade?']);
        DB::table('atencao_basica_perguntas')->insert(['titulo' => 'Os cadastros foram conferidos?']);
    }
}
