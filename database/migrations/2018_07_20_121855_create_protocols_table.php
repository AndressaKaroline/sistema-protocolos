<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtocolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service');
            $table->integer('horasMaquina');
            $table->integer('cargasCaminhao')->nullable();
            $table->integer('quantidadeKm')->nullable();
            $table->boolean('situacao')->nullable();
            $table->integer('requester_id')->unsigned();
            $table->foreign('requester_id')->references('id')->on('requesters');
            $table->boolean('aprovacaoCamara');
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
        Schema::dropIfExists('protocols');
    }
}
