<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_departamento', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');//quando apagar um produto na tabela products, apaga aqui tambem
            $table->foreign('departamento_id')->references('id')
                ->on('departamentos')->onDelete('cascade');
            //relacionamento
            $table->primary(['product_id', 'departamento_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_departamento');
    }
}
