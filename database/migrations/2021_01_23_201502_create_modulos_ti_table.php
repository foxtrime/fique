<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_ti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n_chamado')             ->nullable();
            $table->string('obs')                   ->nullable();
            $table->boolean('chamado_aberto')       ->nullable();
            $table->string('data_chamado_fechado')  ->nullable();
            $table->timestamps();

            $table->integer('relatorio_id')->unsigned();
            $table->integer('pergunta_id')->unsigned();
        });

        Schema::table('modulos_ti', function($table){
            $table->foreign('pergunta_id')->references('id')->on('ti_perguntas');
            $table->foreign('relatorio_id')->references('id')->on('relatorios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_ti');
    }
}
