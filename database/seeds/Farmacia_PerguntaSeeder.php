<?php

use Illuminate\Database\Seeder;

class Farmacia_PerguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farmacia_perguntas')->insert(['titulo' => 'Falta de remédio em estoque?']);
        DB::table('farmacia_perguntas')->insert(['titulo' => 'Todos estão devidamente uniformizados?']);
        DB::table('farmacia_perguntas')->insert(['titulo' => 'Reclamação de atendimento?']);
        DB::table('farmacia_perguntas')->insert(['titulo' => 'Limpeza']);
        DB::table('farmacia_perguntas')->insert(['titulo' => 'Os cadastros foram conferidos?']);
    }
}
