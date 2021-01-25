<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('enviado') ->default(false); 
            $table->string('data');

             // fk
             $table->integer('unidade_id')->nullable()->unsigned();
        });

        Schema::table('relatorios', function($table){
            $table->foreign('unidade_id')->nullable()->references('id')->on('unidades')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relatorios');
    }
}
