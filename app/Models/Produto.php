<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lote;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'precoCusto', 'precoVenda', 'quantidade'];

    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }

    public function funcionarios()
    {
        return $this->belongsToMany(Funcionario::class, 'funcionario_produto', 'produto_id', 'funcionario_id')->withPivot('quantidade');
    }

    public function produtosCompostos()
    {
        return $this->belongsToMany(ProdutoComposto::class, 'produto_produto_composto', 'produto_id', 'produto_composto_id')->withPivot('quantidade');
    }


}
