<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('conta_id')->comment('id da conta corrente');
            $table->unsignedBigInteger('unidade_id')->comment('id da unidade de fornecimento');
            $table->string('codigo')->comment('código do material - part number');
            $table->string('descricao')->comment('descrição do material');
            $table->integer('estoque_minimo')->nullable()->comment('estoque mínimo do material');
            $table->integer('estoque_maximo')->nullable()->comment('estoque máximo do material');
            $table->integer('ponto_reposicao')->nullable()->comment('ponto de reposição do material');
            $table->integer('prazo_compra')->nullable()->comment('prazo para a compra do material');
            $table->timestamps();
            
            //Chaves estrangeiras
            $table->foreign('conta_id')->references('id')->on('contas')->onDelete('cascade');
            $table->foreign('unidade_id')->references('id')->on('unidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiais');
    }
}
