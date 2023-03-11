<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoComposto extends Model
{
    use HasFactory;

    protected $table = 'produto_composto';
    protected $fillable = ['nome', 'precoCusto', 'precoVenda'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_produto_composto', 'produto_composto_id', 'produto_id')->withPivot('quantidade');
    }
}
