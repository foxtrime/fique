<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosFarmaciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_farmacia', function (Blueprint $table) {
            $table->increments('id_far');
            $table->string('nome_far')  ->nullable();
            $table->string('descri_far')  ->nullable();

            $table->timestamps();

            $table->integer('relatorio_id_far') ->unsigned();
            $table->integer('pergunta_id_far') ->unsigned();
        });

        Schema::table('modulos_farmacia', function($table){
            $table->foreign('pergunta_id_far') ->references('id')->on('farmacia_perguntas');
            $table->foreign('relatorio_id_far')  ->references('id')->on('relatorios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_farmacia');
    }
}
