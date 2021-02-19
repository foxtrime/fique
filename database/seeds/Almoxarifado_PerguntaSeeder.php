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
        DB::table('almoxarifado_perguntas')->insert(['titulo' => '']);
    }
}
