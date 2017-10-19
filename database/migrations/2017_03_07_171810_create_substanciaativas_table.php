<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubstanciaativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('substanciaativas', function (Blueprint $table) {
            $table->int('id');
            $table->string('nome');
            $table->text('dose');
            $table->integer('classificacao');
            $table->string('administracao');
            $table->string('diluicao');
            $table->string('estabilidade');
            $table->string('contraindicacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('substanciaativas');
    }
}
