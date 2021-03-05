<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosAtencaoBasicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_atencao_basica', function (Blueprint $table) {
            $table->increments('id_at_basi');
            $table->string('nome_at_basi')      ->nullable();
            $table->string('descri_at_basi')    ->nullable(); 
            
            $table->timestamps();
            
            $table->integer('relatorio_id_at_basi')->unsigned();
            $table->integer('pergunta_id_at_basi')->unsigned();

        });

        Schema::table('modulos_atencao_basica', function($table){
            $table->foreign('pergunta_id_at_basi')->references('id')->on('atencao_basica_perguntas');
            $table->foreign('relatorio_id_at_basi')->references('id')->on('relatorios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_atencao_basica');
    }
}


// $table->increments('id_infra');
// $table->string('n_chamado_infra')             ->nullable();
// $table->string('obs_infra')                   ->nullable();
// $table->boolean('chamado_aberto_infra')       ->default(true);
// $table->string('data_chamado_aberto_infra')   ->nullable();
// $table->string('data_chamado_fechado_infra')  ->nullable();
// $table->timestamps();

// $table->integer('relatorio_id_infra')->unsigned();
// $table->integer('pergunta_id_infra')->unsigned();
// });

// Schema::table('modulos_infraestrutura_predial', function($table){
// $table->foreign('pergunta_id_infra')->references('id')->on('infraestrutura_perguntas');
// $table->foreign('relatorio_id_infra')->references('id')->on('relatorios');
// });
