<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosImunizacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_imunizacao', function (Blueprint $table) {
            $table->increments('id_imuni');

            $table->string('qtd_falta_imuni') ->nullable();
            $table->string('obs_imuni') ->nullable();

            $table->timestamps();

            $table->integer('relatorio_id_imuni')->unsigned();
            $table->integer('pergunta_id_imuni')->unsigned();
        });

        Schema::table('modulos_imunizacao', function($table){
            $table->foreign('pergunta_id_imuni')->references('id')->on('imunizacao_perguntas');
            $table->foreign('relatorio_id_imuni')->references('id')->on('relatorios');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_imunizacao');
    }
}
