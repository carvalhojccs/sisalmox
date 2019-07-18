<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaNaturezaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_natureza', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('conta_id');
            $table->foreign('conta_id')->references('id')->on('contas')->onDelete('cascade');
            $table->unsignedBigInteger('natureza_id');
            $table->foreign('natureza_id')->references('id')->on('naturezas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conta_natureza');
    }
}
