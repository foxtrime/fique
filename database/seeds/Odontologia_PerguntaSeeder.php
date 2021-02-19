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
        DB::table('odontologia_perguntas')->insert(['titulo' => '']);
    }
}
