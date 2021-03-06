<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatorioAntimicrobianosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorio_antimicrobianos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idprescricao_medicamento');
            $table->foreign('idprescricao_medicamento')->references('id')->on('prescricao_medicamentos');
            $table->string('nome');
            $table->string('leito');
            $table->date('data_admissao');
            $table->date('inicio_tratamento');
            $table->string('clinica');
            $table->string('diagnostico_infeccioso');
            $table->integer('duracao_tratamento');
            $table->string('antimicrobiano');
            $table->timestamps();
            $table->string('cultura');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('relatorio_antimicrobianos');
    }
}
