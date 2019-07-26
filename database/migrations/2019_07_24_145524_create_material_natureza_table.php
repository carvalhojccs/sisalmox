<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialNaturezaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_natureza', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materiais')->onDelete('cascade');
            $table->unsignedBigInteger('natureza_id');
            $table->foreign('natureza_id')->references('id')->on('naturezas')->onDelete('cascade');
            $table->double('preco_atual',10,2)->default('0.00')->comment('preco atual do material');
            $table->integer('estoque_atual')->default('0')->nullable()->comment('estoque atual do material');
            $table->timestamp('ultima_compra')->nullable()->comment('data da última compra do material');
            $table->timestamp('ultima_saida')->nullable()->comment('data da última saída do material');
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
        Schema::dropIfExists('material_natureza');
    }
}
