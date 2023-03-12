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

    public function produtosCompostos()
    {
        return $this->belongsToMany(ProdutoComposto::class, 'produto_produto_composto', 'produto_id', 'produto_composto_id')->withPivot('quantidade');
    }

    public function requisicoes()
    {
        return $this->hasMany(Requisicao::class);
    }


}
