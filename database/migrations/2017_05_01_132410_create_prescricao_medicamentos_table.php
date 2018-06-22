<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescricaoMedicamentosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('prescricao_medicamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idprescricao');
            $table->foreign('idprescricao')->references('id')->on('prescricaos');
            $table->integer('idmedicamento')->nullable();
            $table->foreign('idmedicamento')->references('id')->on('medicamentos');
            $table->integer('qtdpedida');
            $table->integer('qtdatendida')->default(0);
            $table->text('posologia');
            $table->text('obs');
            $table->text('administracao');
            $table->text('diluicao');
            $table->text('estabilidade');
            $table->text('dose');
            $table->text('simpas');
            $table->text('outros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('prescricao_medicamentos');
    }

}
