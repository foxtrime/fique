<?php

use Illuminate\Database\Seeder;

class FuncaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('farmacia_perguntas')->insert(['titulo' => 'Falta de remédio em estoque?']);
        DB::table('funcoes')->insert(['nome' => 'Assistente Administrativo', 'valor' => '1800.00']);
        DB::table('funcoes')->insert(['nome' => 'Auxiliar Administrativo', 'valor' => '1238.11']);
        DB::table('funcoes')->insert(['nome' => 'Auxiliar de Serviços Gerais', 'valor' => '1238.11']);
        DB::table('funcoes')->insert(['nome' => 'Auxiliar de Saúde Bucal', 'valor' => '1375.01']);
        DB::table('funcoes')->insert(['nome' => 'Técnico de Enfermagem', 'valor' => '1665.93']);
        DB::table('funcoes')->insert(['nome' => 'Zelador', 'valor' => '1375.01']);
        DB::table('funcoes')->insert(['nome' => 'Coordenador de Enfermagem', 'valor' => '4050.00']);
        DB::table('funcoes')->insert(['nome' => 'Dentista 20H', 'valor' => '2000.00']);
        DB::table('funcoes')->insert(['nome' => 'Dentista 40H', 'valor' => '4000.00']);
        DB::table('funcoes')->insert(['nome' => 'Enferemeiro 40H', 'valor' => '3158.96']);
        DB::table('funcoes')->insert(['nome' => 'Farmaceutico', 'valor' => '3158.96']);
        DB::table('funcoes')->insert(['nome' => 'Médico Generalista 20H', 'valor' => '6000.00']);
        DB::table('funcoes')->insert(['nome' => 'Médico Generalista 40H', 'valor' => '12000.00']);
        DB::table('funcoes')->insert(['nome' => 'Médico Ginecologista', 'valor' => '2700.00']);
    }
}
