<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('locais')->onDelete('cascade');
            $table->string('numero');
            $table->string('aplicacao');
            $table->string('justificativa');
            $table->unsignedBigInteger('motivo_id');
            $table->foreign('motivo_id')->references('id')->on('motivos')->onDelete('cascade');
            $table->string('destino');
            $table->unsignedBigInteger('situacao_id');
            $table->foreign('situacao_id')->references('id')->on('situacoes')->onDelete('cascade');
            $table->string('item');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materiais')->onDelete('cascade');
            $table->integer('quantidade_solicitada');
            $table->integer('quantidade_autorizada')->nullable();
            $table->integer('quantidade_atendida')->nullable();
            $table->integer('solicitante_id');
            $table->integer('encarregado_id');
            $table->integer('chefe_id');
            $table->integer('suprimentista_id');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status_requisicoes')->onDelete('cascade');
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
        Schema::dropIfExists('requisicoes');
    }
}
