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
        Schema::create('produto_produto_compostos', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->foreignId('produto_composto_id')->constrained('produto_compostos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_produto_compostos');
    }
};
