<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosAlmoxarifadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_almoxarifado', function (Blueprint $table) {
            $table->increments('id_almo');

            $table->string('qtd_falta_almo') ->nullable();
            $table->string('obs_almo') ->nullable();

            $table->timestamps();

            $table->integer('relatorio_id_almo')->unsigned();
            $table->integer('pergunta_id_almo')->unsigned();
        });

        Schema::table('modulos_almoxarifado', function($table){
            $table->foreign('pergunta_id_almo')->references('id')->on('almoxarifado_perguntas');
            $table->foreign('relatorio_id_almo')->references('id')->on('relatorios');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_almoxarifado');
    }
}
