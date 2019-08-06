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
            $table->enum('motivo', ['EIFP','EDCR','RESSUPRIMENTO','MNT. PREVENTIVA','OUTROS']);
            $table->string('destino');
            $table->enum('situacao', ['NORMAL','URGENTE']);
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
