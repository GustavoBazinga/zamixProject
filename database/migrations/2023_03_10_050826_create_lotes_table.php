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
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidadeRecebida');
            $table->float('precoLote');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->timestamps();

            /* UM LOTE NECESSITA DE UM PRODUTO */
            $table->unsignedBigInteger('produto_id')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
