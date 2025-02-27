<?php

use App\Models\Categoria;
use App\Models\UnidadeMedida;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->timestamps();
            $table->string('nome');
            $table->string('descricao');
            $table->integer('quantidade')->default(0);
            $table->float('preco');
            $table->string('imagem_src')->default('produto.png');
            $table->foreignIdFor(Categoria::class);
            $table->foreignIdFor(UnidadeMedida::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
