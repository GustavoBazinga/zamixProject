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
//            $table->dropPrimary('id');
//            $table->bigIncrements('id');
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unsignedBigInteger('produto_composto_id');
            $table->foreign('produto_composto_id')->references('id')->on('produto_composto');
            $table->unsignedBigInteger('requisicao_id');
            $table->foreign('requisicao_id')->references('id')->on('requisicaos');
            $table->integer('quantidade');
            $table->boolean('status')->nullable()->default(null);
            $table->foreignId('funcionario_id')->nullable()->constrained('funcionarios');
            $table->timestamps();

            $table->primary(['produto_id', 'produto_composto_id', 'requisicao_id']);
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
