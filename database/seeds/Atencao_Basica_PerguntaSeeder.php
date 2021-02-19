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
        DB::table('atencao_basica_perguntas')->insert(['titulo' => '']);
    }
}
