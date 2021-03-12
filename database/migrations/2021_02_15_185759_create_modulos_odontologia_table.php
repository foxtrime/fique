<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosOdontologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_odontologia', function (Blueprint $table) {
            $table->increments('id_odonto');
            $table->string('nome_odonto')    ->nullable();
            $table->string('descri_odonto')    ->nullable();

            $table->timestamps();

            $table->integer('relatorio_id_odonto')->unsigned();
            $table->integer('pergunta_id_odonto')->unsigned();
        });

        Schema::table('modulos_odontologia', function($table){
            $table->foreign('pergunta_id_odonto')->references('id')->on('odontologia_perguntas');
            $table->foreign('relatorio_id_odonto')->references('id')->on('relatorios');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_odontologia');
    }
}
