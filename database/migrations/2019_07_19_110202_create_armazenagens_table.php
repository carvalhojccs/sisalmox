<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmazenagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('armazenagens', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id do local de armazenagem');
            $table->unsignedBigInteger('armazem_id')->comment('id do armazem');
            $table->string('nome')->comment('nome do local de armazenagem');
            $table->string('sigla')->comment('sigla do local de armazenagem');
            $table->timestamps();
            
            //relacionamentos
            $table->foreign('armazem_id')->references('id')->on('armazens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('armazenagens');
    }
}
