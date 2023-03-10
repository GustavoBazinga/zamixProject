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
        Schema::create('funcionario_produtos', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->foreignId('funcionario_id')->constrained('funcionarios');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionario_produtos');
    }
};
