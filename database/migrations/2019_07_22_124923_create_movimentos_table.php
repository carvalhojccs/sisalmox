<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('conta_id');
            $table->foreign('conta_id')->references('id')->on('contas')->onDelete('cascade');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materiais')->onDelete('cascade');
            $table->unsignedBigInteger('tipo_movimento_id');
            $table->foreign('tipo_movimento_id')->references('id')->on('tipo_movimentos')->onDelete('cascade');
            $table->unsignedBigInteger('documento_id');
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->unsignedBigInteger('natureza_id');
            $table->foreign('natureza_id')->references('id')->on('naturezas')->onDelete('cascade');
            $table->string('numero_documento');
            $table->date('data_documento');
            $table->bigInteger('estoque_anterior')->nullable();
            $table->bigInteger('quantidade');
            $table->double('preco',10.2);
            $table->unsignedBigInteger('armazenagem_id');
            $table->foreign('armazenagem_id')->references('id')->on('armazenagens')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('movimentos');
    }
}
