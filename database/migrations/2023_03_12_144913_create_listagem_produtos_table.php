<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listagem_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id')->nullable();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unsignedBigInteger('produto_composto_id')->nullable();
            $table->foreign('produto_composto_id')->references('id')->on('produto_composto');
            $table->unsignedBigInteger('requisicao_id');
            $table->foreign('requisicao_id')->references('id')->on('requisicaos');
            $table->integer('quantidade');


            $table->timestamps();

//            $table->primary(['requisicao_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listagem_produtos');
    }
};
