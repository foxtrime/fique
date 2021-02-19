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
        DB::table('farmacia_perguntas')->insert(['titulo' => '']);
    }
}
