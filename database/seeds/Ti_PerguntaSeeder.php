<?php

use Illuminate\Database\Seeder;

class Ti_PerguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ti_perguntas')->insert(['titulo' => 'Algum problema com relação ao sistema?']);
        DB::table('ti_perguntas')->insert(['titulo' => 'Necessidade de capacitação para operar o sistema? (Datas de disponibilidade de agendamento)']);
        DB::table('ti_perguntas')->insert(['titulo' => 'Problemas com telefone ou voip?']);
        DB::table('ti_perguntas')->insert(['titulo' => 'Problemas com sistema Bioslab?']);
        DB::table('ti_perguntas')->insert(['titulo' => 'Problema com equipamento (computador, tablet, impressora)?']);
        DB::table('ti_perguntas')->insert(['titulo' => 'Problema com a internet?']);
    }
}
