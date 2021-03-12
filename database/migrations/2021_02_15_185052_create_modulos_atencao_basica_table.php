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
