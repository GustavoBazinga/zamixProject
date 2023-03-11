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
            $table->foreignId('produto_id')->nullable()->constrained('produtos');
            $table->foreignId('produto_composto_id')->nullable()->constrained('produto_composto');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
