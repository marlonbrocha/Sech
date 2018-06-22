<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMigrationInternacaoCid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internacao_cids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcid10');
            $table->integer('idinternacao');
            $table->foreign('idcid10')->references('id')->on('cid10s');
            $table->foreign('idinternacao')->references('id')->on('internacaos');
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
        Schema::drop('internacao_cids');
    }
}
