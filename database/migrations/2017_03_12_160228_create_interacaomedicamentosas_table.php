<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteracaomedicamentosasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interacaomedicamentosas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idsubstanciaativa1')->unsigned();
            $table->string('idsubstanciaativa2')->unsigned();
            $table->string('gravidade');
            $table->text('consequencia');
            
            $table->unique(['idsubstanciaativa1', 'idsubstanciaativa2']);

            $table->foreign('idsubstanciaativa1')->references('codigo')->on('substanciaativas')
                ->onUpdate('restrict')
                ->onDelete('cascade');
            $table->foreign('idsubstanciaativa2')->references('codigo')->on('substanciaativas')
                ->onUpdate('restrict')
                ->onDelete('cascade');
            
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
        Schema::drop('interacaomedicamentosas');
    }
}
