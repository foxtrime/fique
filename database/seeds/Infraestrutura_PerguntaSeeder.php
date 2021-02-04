<?php

use Illuminate\Database\Seeder;

class Infraestrutura_PerguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infraestrutura_perguntas')->insert(['titulo' => 'Necessidade de reparo de Iluminação?']);
        DB::table('infraestrutura_perguntas')->insert(['titulo' => 'Abastecimento de água ok?']);
        DB::table('infraestrutura_perguntas')->insert(['titulo' => 'Boa refrigeração do ar condicionado?']);
        DB::table('infraestrutura_perguntas')->insert(['titulo' => 'Necessidade de reparo de Energia?']);
        DB::table('infraestrutura_perguntas')->insert(['titulo' => 'Necessidade de reparo da estrutura?']);
        DB::table('infraestrutura_perguntas')->insert(['titulo' => 'A pintura está desgastada?']);
        DB::table('infraestrutura_perguntas')->insert(['titulo' => 'Problemas com mobiliário (moveis/mobilia)']);
    }
}
