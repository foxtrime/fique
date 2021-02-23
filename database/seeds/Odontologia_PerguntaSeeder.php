<?php

use Illuminate\Database\Seeder;

class Odontologia_PerguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('odontologia_perguntas')->insert(['titulo' => 'Falta de dentista?']);
        DB::table('odontologia_perguntas')->insert(['titulo' => 'Tem day off na unidade?']);
        DB::table('odontologia_perguntas')->insert(['titulo' => 'Atrasos?']);
        DB::table('odontologia_perguntas')->insert(['titulo' => 'Visita Domiciliar – dentistas em vd (nominal)']);
        DB::table('odontologia_perguntas')->insert(['titulo' => 'Todos estão devidamente uniformizados?']);
        DB::table('odontologia_perguntas')->insert(['titulo' => 'Problema com algum equipamento?']);
        DB::table('odontologia_perguntas')->insert(['titulo' => 'Falta de material de insumos?']);
        DB::table('odontologia_perguntas')->insert(['titulo' => 'Os cadastros foram conferidos?']);

    }
}
