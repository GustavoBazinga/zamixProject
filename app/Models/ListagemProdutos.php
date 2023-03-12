<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListagemProdutos extends Model
{
    use HasFactory;

    protected $table = 'listagem_produtos';
    protected $fillable = ['produto_id', 'produto_composto_id', 'requisicao_id', 'quantidade', 'status', 'funcionario_id'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function produtoComposto()
    {
        return $this->belongsTo(ProdutoComposto::class);
    }

    public function requisicao()
    {
        return $this->belongsTo(Requisicao::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
