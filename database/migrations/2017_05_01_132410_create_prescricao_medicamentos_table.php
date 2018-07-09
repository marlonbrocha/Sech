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
            $table->integer('qtdpedida')->nullable();
            $table->integer('qtdatendida')->default(0);
            $table->string('posologia');
            $table->string('intervalo_posologia');
            $table->string('obs')->nullable();
            $table->string('administracao')->nullable();
            $table->string('diluicao')->nullable();
            $table->string('estabilidade')->nullable();
            $table->string('dose')->nullable();
            $table->string('simpas')->nullable();
            $table->string('outros')->nullable();
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
