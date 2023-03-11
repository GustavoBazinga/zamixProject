<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoProdutoComposto extends Model
{
    use HasFactory;

    protected $table = 'produto_produto_compostos';
    protected $fillable = ['produto_id', 'produto_composto_id', 'quantidade'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function produtoComposto()
    {
        return $this->belongsTo(ProdutoComposto::class);
    }
}
